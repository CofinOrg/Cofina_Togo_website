<script setup lang="ts">
import { ref, nextTick } from 'vue'

const chatOpen = ref(false)
const chatMessage = ref('')
const messagesContainer = ref<HTMLElement | null>(null)

interface ChatMessage {
  id: number
  text: string
  sender: 'bot' | 'user'
  time: string
}

const chatMessages = ref<ChatMessage[]>([
  {
    id: 1,
    text: 'Bonjour ! Bienvenue chez COFINA Togo. Comment puis-je vous aider ?',
    sender: 'bot',
    time: new Date().toLocaleTimeString('fr-FR', { hour: '2-digit', minute: '2-digit' }),
  },
])

let messageIdCounter = 2

const toggleChat = () => {
  chatOpen.value = !chatOpen.value
}

const scrollToBottom = () => {
  nextTick(() => {
    if (messagesContainer.value) {
      messagesContainer.value.scrollTop = messagesContainer.value.scrollHeight
    }
  })
}

const sendMessage = async () => {
  const text = chatMessage.value.trim()
  if (!text) return

  chatMessages.value.push({
    id: messageIdCounter++,
    text,
    sender: 'user',
    time: new Date().toLocaleTimeString('fr-FR', { hour: '2-digit', minute: '2-digit' }),
  })

  chatMessage.value = ''
  scrollToBottom()

  try {
    const response = await fetch(`/api/chat?question=${encodeURIComponent(text)}`, {
      headers: { 'Accept': 'application/json' },
    })
    const data = await response.json()

    chatMessages.value.push({
      id: messageIdCounter++,
      text: data.answer,
      sender: 'bot',
      time: new Date().toLocaleTimeString('fr-FR', { hour: '2-digit', minute: '2-digit' }),
    })
  } catch {
    chatMessages.value.push({
      id: messageIdCounter++,
      text: 'Désolé, une erreur est survenue. Veuillez réessayer.',
      sender: 'bot',
      time: new Date().toLocaleTimeString('fr-FR', { hour: '2-digit', minute: '2-digit' }),
    })
  }

  scrollToBottom()
}
</script>

<template>
  <div class="fixed bottom-6 right-6 z-50 flex flex-col items-end gap-3">

    <!-- Fenêtre de chat -->
    <Transition name="chat">
      <div
        v-if="chatOpen"
        class="w-80 max-w-[calc(100vw-2rem)] h-90 max-h-[calc(100vh-8rem)] bg-white rounded-2xl shadow-2xl flex flex-col overflow-hidden"
      >
        <!-- Header -->
        <div class="bg-primary px-4 py-3 flex items-center justify-between shrink-0">
          <div class="flex items-center gap-2.5">
            <div class="w-8 h-8 bg-white rounded-full flex items-center justify-center">
              <img
                src="../assets/images/accueil/COFINA Logo.png"
                alt="Cofina"
                class="w-auto"
              />
            </div>
            <div>
              <p class="text-white text-xs font-bold leading-tight">COFINA Togo</p>
              <div class="flex items-center gap-1">
                <span class="w-1.5 h-1.5 bg-green-400 rounded-full"></span>
                <span class="text-white/80 text-[10px]">En ligne</span>
              </div>
            </div>
          </div>
          <button
            @click="toggleChat"
            class="text-white/80 hover:text-white transition-colors p-1"
            aria-label="Fermer le chat"
          >
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>

        <!-- Messages -->
        <div
          ref="messagesContainer"
          class="flex-1 overflow-y-auto px-3 py-3 space-y-2.5 bg-gray-50"
        >
          <div
            v-for="msg in chatMessages"
            :key="msg.id"
            :class="[
              'max-w-[80%] px-3 py-2 rounded-2xl text-xs leading-relaxed',
              msg.sender === 'bot'
                ? 'bg-white text-gray-800 rounded-bl-sm shadow-sm'
                : 'bg-primary text-white rounded-br-sm ml-auto'
            ]"
          >
            <p>{{ msg.text }}</p>
            <p
              :class="[
                'text-[9px] mt-0.5',
                msg.sender === 'bot' ? 'text-gray-400' : 'text-white/60'
              ]"
            >
              {{ msg.time }}
            </p>
          </div>
        </div>

        <!-- Input -->
        <div class="px-3 py-2.5 border-t border-gray-200 bg-white shrink-0">
          <form @submit.prevent="sendMessage" class="flex items-center gap-2">
            <input
              v-model="chatMessage"
              type="text"
              placeholder="Tapez votre message..."
              class="flex-1 px-3 py-2 bg-gray-100 rounded-full text-xs text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:bg-white transition-all"
            />
            <button
              type="submit"
              :disabled="!chatMessage.trim()"
              class="w-8 h-8 bg-primary text-white rounded-full flex items-center justify-center hover:bg-secondary transition-colors disabled:opacity-40 disabled:cursor-not-allowed shrink-0"
              aria-label="Envoyer"
            >
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19V5m0 0l-7 7m7-7l7 7" />
              </svg>
            </button>
          </form>
        </div>
      </div>
    </Transition>

    <!-- Bouton flottant -->
    <button
      @click="toggleChat"
      class="w-12 h-12 bg-primary hover:bg-secondary text-white rounded-full shadow-2xl transition-all duration-300 flex items-center justify-center group hover:scale-110 shrink-0"
      aria-label="Chat"
    >
      <svg v-if="!chatOpen" class="w-5 h-5 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd" />
      </svg>
      <svg v-else class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </button>
  </div>
</template>

<style scoped>
.chat-enter-active {
  animation: chatIn 0.3s cubic-bezier(0.16, 1, 0.3, 1);
}

.chat-leave-active {
  animation: chatIn 0.2s ease-in reverse;
}

@keyframes chatIn {
  from {
    opacity: 0;
    transform: translateY(16px) scale(0.95);
  }
  to {
    opacity: 1;
    transform: translateY(0) scale(1);
  }
}
</style>
