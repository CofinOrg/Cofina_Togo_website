<script setup lang="ts">
import { ref, onMounted } from 'vue'

const props = withDefaults(defineProps<{
  animation?: 'fade-up' | 'fade-left' | 'fade-right' | 'fade-zoom'
  delay?: number
  duration?: number
  threshold?: number
  stagger?: boolean
  staggerDelay?: number
}>(), {
  animation: 'fade-up',
  delay: 0,
  duration: 700,
  threshold: 0.1,
  stagger: false,
  staggerDelay: 80,
})

const elRef = ref<HTMLElement | null>(null)
const isVisible = ref(false)

onMounted(() => {
  requestAnimationFrame(() => {
    requestAnimationFrame(() => {
      if (props.stagger && elRef.value) {
        const children = Array.from(elRef.value.children) as HTMLElement[]
        children.forEach((child, i) => {
          const d = props.delay + i * props.staggerDelay
          child.style.opacity = '0'
          child.style.transform = 'translateY(28px)'
          child.style.transition = [
            `opacity ${props.duration}ms cubic-bezier(0.16,1,0.3,1) ${d}ms`,
            `transform ${props.duration}ms cubic-bezier(0.16,1,0.3,1) ${d}ms`,
          ].join(', ')
        })
      }

      const observer = new IntersectionObserver(([entry]) => {
        if (entry.isIntersecting) {
          if (props.stagger && elRef.value) {
            const children = Array.from(elRef.value.children) as HTMLElement[]
            children.forEach((child, i) => {
              const d = props.delay + i * props.staggerDelay
              child.style.opacity = '1'
              child.style.transform = 'none'
              // Libère les styles inline après l'animation pour que les hover transitions fonctionnent
              setTimeout(() => {
                child.style.opacity = ''
                child.style.transform = ''
                child.style.transition = ''
              }, d + props.duration + 50)
            })
          }
          isVisible.value = true
          observer.disconnect()
        }
      }, { threshold: props.threshold })

      if (elRef.value) observer.observe(elRef.value)
    })
  })
})
</script>

<template>
  <div
    ref="elRef"
    :class="stagger ? undefined : ['scroll-reveal', `sr-${animation}`, { 'is-visible': isVisible }]"
    :style="stagger ? undefined : { '--sr-delay': `${delay}ms`, '--sr-duration': `${duration}ms` }"
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
.sr-fade-up { opacity: 0; transform: translateY(40px); }
.sr-fade-up.is-visible { opacity: 1; transform: translateY(0); }

/* ── Fade left ── */
.sr-fade-left { opacity: 0; transform: translateX(-40px); }
.sr-fade-left.is-visible { opacity: 1; transform: translateX(0); }

/* ── Fade right ── */
.sr-fade-right { opacity: 0; transform: translateX(40px); }
.sr-fade-right.is-visible { opacity: 1; transform: translateX(0); }

/* ── Fade zoom ── */
.sr-fade-zoom { opacity: 0; transform: scale(0.94) translateY(20px); }
.sr-fade-zoom.is-visible { opacity: 1; transform: scale(1) translateY(0); }
</style>
