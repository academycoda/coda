import { gsap } from 'gsap';

const homepageMotion = {
  initialize() {
    const page = document.querySelector('body');

    if (!page || page.dataset.motionInitialized === 'true') {
      return;
    }

    page.dataset.motionInitialized = 'true';

    const media = gsap.matchMedia();

    media.add(
      {
        allowMotion: '(prefers-reduced-motion: no-preference)',
        reduceMotion: '(prefers-reduced-motion: reduce)',
      },
      ({ conditions }) => {
        if (conditions.reduceMotion) {
          gsap.set('[data-motion-reveal], [data-motion-item], [data-motion-float]', {
            clearProps: 'all',
          });

          return;
        }

        gsap.defaults({
          duration: 0.8,
          ease: 'power3.out',
        });

        this.animateHero();
        this.animateWorkflow();
        this.animateOnEnter();
        this.animateFloatingAccents();
      },
      page,
    );
  },

  animateHero() {
    gsap.from('[data-motion-hero]', {
      autoAlpha: 0,
      y: 44,
      duration: 1.05,
      stagger: 0.12,
      clearProps: 'transform,visibility',
    });

    gsap.fromTo(
      '[data-motion-editor]',
      {
        autoAlpha: 0,
        x: 76,
        rotation: 2.5,
        scale: 0.92,
      },
      {
        autoAlpha: 1,
        x: 0,
        rotation: 0,
        scale: 1,
        duration: 1.05,
        delay: 0.18,
        ease: 'back.out(1.45)',
        clearProps: 'transform,visibility',
      },
    );

    gsap.from('[data-motion-editor] [data-motion-item], [data-motion-editor] .font-mono', {
      autoAlpha: 0,
      x: -18,
      duration: 0.48,
      delay: 0.72,
      stagger: 0.08,
      clearProps: 'transform,visibility',
    });
  },

  animateWorkflow() {
    gsap.fromTo(
      '[data-motion-workflow]',
      {
        autoAlpha: 0,
        y: 26,
        scale: 0.96,
      },
      {
        autoAlpha: 1,
        y: 0,
        scale: 1,
        duration: 0.72,
        delay: 0.56,
        ease: 'power3.out',
        clearProps: 'transform,visibility',
      },
    );

    gsap.from('[data-motion-workflow-item]', {
      autoAlpha: 0,
      x: -14,
      duration: 0.34,
      delay: 0.78,
      stagger: 0.08,
      ease: 'power2.out',
      clearProps: 'transform,visibility',
    });
  },

  animateOnEnter() {
    const revealTargets = document.querySelectorAll('[data-motion-reveal]');
    const staggerItems = document.querySelectorAll('[data-motion-stagger] [data-motion-item]');

    gsap.set([...revealTargets, ...staggerItems], {
      autoAlpha: 0,
      y: 42,
      scale: 0.97,
    });

    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (!entry.isIntersecting) {
            return;
          }

          const element = entry.target;
          const items = element.matches('[data-motion-stagger]')
            ? element.querySelectorAll('[data-motion-item]')
            : [element];
          const isCoursesGrid = element.matches('[data-motion-courses]');

          gsap.to(items, {
            autoAlpha: 1,
            y: 0,
            scale: 1,
            duration: isCoursesGrid ? 0.95 : 0.82,
            stagger: {
              each: isCoursesGrid ? 0.16 : 0.09,
              from: 'start',
            },
            ease: isCoursesGrid ? 'back.out(1.18)' : 'power3.out',
            clearProps: 'transform,visibility',
          });

          observer.unobserve(element);
        });
      },
      {
        rootMargin: '0px 0px -12% 0px',
        threshold: 0.18,
      },
    );

    document.querySelectorAll('[data-motion-reveal], [data-motion-stagger]').forEach((element) => {
      observer.observe(element);
    });
  },

  animateFloatingAccents() {
    gsap.to('[data-motion-float]', {
      y: (index) => (index % 2 === 0 ? -24 : 24),
      rotation: (index) => (index % 2 === 0 ? 7 : -7),
      scale: (index) => (index % 2 === 0 ? 1.03 : 0.97),
      duration: 3.6,
      ease: 'sine.inOut',
      repeat: -1,
      yoyo: true,
      stagger: 0.35,
    });
  },
};

if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', () => homepageMotion.initialize());
} else {
  homepageMotion.initialize();
}

document.addEventListener('livewire:navigated', () => homepageMotion.initialize());
