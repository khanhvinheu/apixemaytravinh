<template>
    <div>
        <app-header></app-header>
        <main class="py-4">
            <transition name="slide-fade">
                <router-view></router-view>
            </transition>
        </main>
        <app-footer></app-footer>
    </div>
</template>

<script>
import AppHeader from './layouts/Header';
import AppFooter from './layouts/Footer';

export default {
    name: 'Index',
    components: {
        AppHeader,
        AppFooter
    },
}
</script>
<style scoped>
.py-4{
  padding: 0px;
}
.slide-fade-enter-active {
  transition: all .3s ease;
}
.slide-fade-leave-active {
  transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.slide-fade-enter, .slide-fade-leave-to {
  transform: translateX(10px);
  opacity: 0;
}
</style>