// Composables
import { createRouter, createWebHistory } from 'vue-router'

const routes = [
  {
    path: '/',
    name: 'home',
    component: () => import('@/views/DefaultIndex.vue'),
    
  },
  {
    path: '/patient',
    name:'patientIndex',
    component: () => import('@/views/Patient/PatientIndex.vue'),
  },
  {
    path: '/patient/create',
    name: 'patientCreate',
    component: () => import('@/views/Patient/PatientCreate.vue'),
    
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
})

export default router
