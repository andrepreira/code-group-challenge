const Welcome = () => import('./components/Welcome.vue')
const ClientList = () => import('./components/client/List.vue')
const ClientCreate = () => import('./components/client/Add.vue')
const ClientEdit = () => import('./components/client/Edit.vue')

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Welcome
    },
    {
        name: 'clientList',
        path: '/client',
        component: ClientList
    },
    {
        name: 'clientEdit',
        path: '/client/:id/edit',
        component: ClientEdit
    },
    {
        name: 'clientAdd',
        path: '/client/add',
        component: ClientCreate
    }
]
