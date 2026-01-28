<template>
  <div class="rounded-lg border border-gray-300 overflow-hidden bg-white">
    <QuillEditor
      ref="quillRef"
      v-model:content="content"
      theme="snow"
      content-type="html"
      :toolbar="toolbarOptions"
      :modules="modules"
      @update:content="handleUpdate"
      @ready="onEditorReady"
      class="quill-editor"
    />
    <!-- Input caché image -->
    <input
      ref="fileInput"
      type="file"
      accept="image/*"
      class="hidden"
      @change="handleImageUpload"
    />
  </div>
</template>

<script setup lang="ts">
import { ref, watch, onBeforeUnmount } from 'vue'
import { QuillEditor } from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css'
import BlotFormatter, { ImageSpec, IframeVideoSpec } from 'quill-blot-formatter'

interface Props {
  modelValue?: string
}

const props = defineProps<Props>()
const emit = defineEmits<{
  (e: 'update:modelValue', value: string): void
}>()

const content = ref(props.modelValue || '')
const quillRef = ref<any>(null)
const fileInput = ref<HTMLInputElement | null>(null)

const toolbarOptions = [
  [{ header: [1, 2, 3, 4, 5, 6, false] }],
  [{ size: ['small', false, 'large', 'huge'] }],
  ['bold', 'italic', 'underline', 'strike'],
  [{ color: [] }, { background: [] }],
  [{ list: 'ordered' }, { list: 'bullet' }],
  [{ align: [] }],
  ['blockquote', 'code-block'],
  ['link', 'image', 'video'],
  ['clean'],
]

// Configuration des modules Quill avec BlotFormatter pour images et vidéos
const modules = {
  name: 'blotFormatter',
  module: BlotFormatter,
  options: {
    specs: [ImageSpec, IframeVideoSpec],
    overlay: {
      style: {
        border: '2px solid #3b82f6',
      }
    }
  }
}

let quillInstance: any = null
let selectedBlot: HTMLElement | null = null

// Gestionnaire pour supprimer les médias sélectionnés avec Delete/Backspace
const handleKeydown = (event: KeyboardEvent) => {
  if (!quillInstance) return

  if (event.key === 'Delete' || event.key === 'Backspace') {
    // Vérifie si un élément est sélectionné par BlotFormatter (overlay visible)
    const overlay = document.querySelector('.blot-formatter__overlay')
    if (overlay && selectedBlot) {
      event.preventDefault()
      const blot = quillInstance.constructor.find(selectedBlot)
      if (blot) {
        const index = quillInstance.getIndex(blot)
        quillInstance.deleteText(index, 1)
        selectedBlot = null
      }
      return
    }

    // Sinon vérifie la sélection Quill normale
    const selection = quillInstance.getSelection()
    if (!selection) return

    const [leaf] = quillInstance.getLeaf(selection.index)
    if (leaf && leaf.domNode) {
      const tagName = leaf.domNode.tagName?.toLowerCase()
      if (tagName === 'img' || tagName === 'video' || tagName === 'iframe') {
        event.preventDefault()
        quillInstance.deleteText(selection.index, 1)
      }
    }
  }
}

// Écoute les clics sur les images/vidéos pour tracker l'élément sélectionné
const handleMediaClick = (event: Event) => {
  const target = event.target as HTMLElement
  const tagName = target.tagName?.toLowerCase()
  if (tagName === 'img' || tagName === 'video' || tagName === 'iframe') {
    selectedBlot = target
  }
}

const onEditorReady = (quill: any) => {
  quillInstance = quill
  const toolbar = quill.getModule('toolbar')
  toolbar.addHandler('image', () => fileInput.value?.click())

  // Ajoute les écouteurs d'événements
  document.addEventListener('keydown', handleKeydown)
  quill.root.addEventListener('click', handleMediaClick)
}

onBeforeUnmount(() => {
  document.removeEventListener('keydown', handleKeydown)
  if (quillInstance) {
    quillInstance.root.removeEventListener('click', handleMediaClick)
  }
})

const handleImageUpload = async (event: Event) => {
  const input = event.target as HTMLInputElement
  const file = input.files?.[0]

  if (!file || !file.type.startsWith('image/')) return

  if (file.size > 5 * 1024 * 1024) {
    alert('Image trop volumineuse (max 5MB)')
    return
  }

  const base64 = await convertToBase64(file)
  insertImage(base64)
  input.value = ''
}

const convertToBase64 = (file: File) =>
  new Promise<string>((resolve, reject) => {
    const reader = new FileReader()
    reader.onload = () => resolve(reader.result as string)
    reader.onerror = reject
    reader.readAsDataURL(file)
  })

const insertImage = (url: string) => {
  if (!quillInstance) return
  const range = quillInstance.getSelection(true)
  quillInstance.insertEmbed(range.index, 'image', url)
  quillInstance.setSelection(range.index + 1)
}

const handleUpdate = (value: string) => {
  emit('update:modelValue', value)
}

watch(
  () => props.modelValue,
  (val) => {
    if (val !== content.value) content.value = val || ''
  }
)
</script>

<!-- GLOBAL (important pour Quill) -->
<style>
.quill-editor .ql-toolbar {
  background-color: #f9fafb; /* gray-50 */
  border-bottom: 1px solid #d1d5db; /* gray-300 */
}

.quill-editor .ql-container {
  background-color: white;
  min-height: 400px;
  font-size: 16px;
  font-family: system-ui, sans-serif;
}

.quill-editor .ql-editor {
  padding: 1.5rem;
  line-height: 1.75;
}

.quill-editor .ql-editor h1 {
  font-size: 2.25rem;
  font-weight: 700;
  margin-bottom: 1rem;
}

.quill-editor .ql-editor h2 {
  font-size: 1.875rem;
  font-weight: 700;
  margin-bottom: 0.75rem;
}

.quill-editor .ql-editor img,
.quill-editor .ql-editor iframe {
  max-width: 100%;
  border-radius: 0.5rem;
  margin: 1rem 0;
  cursor: pointer;
}

/* Styles pour BlotFormatter */
.blot-formatter__overlay {
  position: absolute;
  box-sizing: border-box;
  border: 2px solid #3b82f6;
}

.blot-formatter__toolbar {
  position: absolute;
  top: -40px;
  left: 0;
  background: white;
  border: 1px solid #d1d5db;
  border-radius: 0.375rem;
  padding: 0.25rem;
  display: flex;
  gap: 0.25rem;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  z-index: 10;
}

.blot-formatter__toolbar-button {
  padding: 0.375rem 0.5rem;
  background: white;
  border: 1px solid #d1d5db;
  border-radius: 0.25rem;
  cursor: pointer;
  font-size: 0.875rem;
  transition: all 0.2s;
}

.blot-formatter__toolbar-button:hover {
  background: #f3f4f6;
  border-color: #3b82f6;
}

.blot-formatter__resize-handle {
  position: absolute;
  width: 12px;
  height: 12px;
  background: #3b82f6;
  border: 2px solid white;
  border-radius: 50%;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}
</style>
