import Index from './components/Index'
import HelloWorld from './components/content/HelloWorld'
import ContentOne from './components/content/ContentOne'
import ContentTwo from './components/content/ContentTwo'

const routes = [,
    {
        path: '/',
        component: Index,
        name: 'Index',
        redirect: '/',
        children: [
            {
                path: '/',
                component: HelloWorld,
            },
            {
                path: 'ContentOne',
                name: 'contentone',
                component: ContentOne,
            },
            {
                path: 'ContentTwo',
                name: 'contentwo',
                component: ContentTwo,
            }
        ]
    }
   
];

export default routes;