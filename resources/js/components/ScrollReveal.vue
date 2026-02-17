<script setup lang="ts">
import { ref, onMounted } from 'vue'

const props = withDefaults(defineProps<{
  animation?: 'fade-up' | 'fade-left' | 'fade-right'
  delay?: number
  duration?: number
  threshold?: number
}>(), {
  animation: 'fade-up',
  delay: 0,
  duration: 700,
  threshold: 0.15,
})

const elRef = ref<HTMLElement | null>(null)
const isVisible = ref(false)

onMounted(() => {
  requestAnimationFrame(() => {
    requestAnimationFrame(() => {
      const observer = new IntersectionObserver(
        ([entry]) => {
          if (entry.isIntersecting) {
            isVisible.value = true
            observer.disconnect()
          }
        },
        { threshold: props.threshold }
      )

      if (elRef.value) {
        observer.observe(elRef.value)
      }
    })
  })
})
</script>

<template>
  <div
    ref="elRef"
    class="scroll-reveal"
    :class="[`sr-${animation}`, { 'is-visible': isVisible }]"
    :style="{
      '--sr-delay': `${delay}ms`,
      '--sr-duration': `${duration}ms`,
    }"
  >
    <slot />
  </div>
</template>

<style scoped>
.scroll-reveal {
  transition-property: opacity, transform;
  transition-timing-function: cubic-bezier(0.16, 1, 0.3, 1);
  transition-duration: var(--sr-duration);
  transition-delay: var(--sr-delay);
}

/* ── Fade up ── */
.sr-fade-up {
  opacity: 0;
  transform: translateY(40px);
}

.sr-fade-up.is-visible {
  opacity: 1;
  transform: translateY(0);
}

/* ── Fade left ── */
.sr-fade-left {
  opacity: 0;
  transform: translateX(-40px);
}

.sr-fade-left.is-visible {
  opacity: 1;
  transform: translateX(0);
}

/* ── Fade right ── */
.sr-fade-right {
  opacity: 0;
  transform: translateX(40px);
}

.sr-fade-right.is-visible {
  opacity: 1;
  transform: translateX(0);
}
</style>
