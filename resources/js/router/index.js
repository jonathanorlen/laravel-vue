import Home from '../views/Home'
import About from '../views/About'
import Contact from '../views/Contact'

export default{
     mode: 'history',
     linkActiveClass: 'active',
     routes: [
          {
               path: '/home',
               name:'home',
               component: Home
          },
          {
               path: '/about',
               name:'about',
               component: About
          },
          {
               path: '/contact',
               name:'contact',
               component: Contact
          },
     ]
}