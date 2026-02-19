<script setup>

import Herosectionenhanced from '../../components/Home-components/Herosectionenhanced.vue'
import Rsisection from '../../components/Home-components/Rsisection.vue'
import Solutions from '@/components/Home-components/Solutions.vue';
import Privilege from '@/components/Home-components/Privilege.vue';
import CTA from '@/components/Home-components/CTA.vue';
import Blog from '@/components/Home-components/Blog.vue';
import ScrollReveal from '@/components/ScrollReveal.vue';
</script>

<template>
  <div class="overflow-x-hidden">
    <Herosectionenhanced />

    <!-- <Rsisection /> -->

    <ScrollReveal animation="fade-up" :duration="800">
      <Solutions />
    </ScrollReveal>

    <ScrollReveal animation="fade-left" :duration="700" :delay="100">
      <Privilege />
    </ScrollReveal>

    <ScrollReveal animation="fade-right" :duration="700" :delay="100">
      <CTA />
    </ScrollReveal>

    <ScrollReveal animation="fade-up" :duration="800" :delay="150">
      <Blog />
    </ScrollReveal>
  </div>
</template>
