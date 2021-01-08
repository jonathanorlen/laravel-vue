import Home from '../views/Home'
import About from '../views/About'
import Contact from '../views/Contact'
import NoteCreate from '../views/note/Create'
import NoteTable from '../views/note/Table'
import NoteShow from '../views/note/Show'
import EditNote from '../views/note/Edit'

export default{
     mode: 'history',
     linkActiveClass: 'active',
     routes: [
          {
               path: '/',
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
          {
               path: '/note/create',
               name:'note.create',
               component: NoteCreate
          },
          {
               path: '/note/table',
               name:'note.table',
               component: NoteTable
          },
          {
               path: '/note/:slug',
               name:'note.show',
               component: NoteShow
          },
          {
               path: '/note/:slug/edit',
               name:'note.edit',
               component: EditNote
          },
     ]
}