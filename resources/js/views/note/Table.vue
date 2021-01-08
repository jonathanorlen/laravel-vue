<template>
     <div class="container">
          <h5>Table Note</h5>
          <hr>
          <table class="table">
               <thead>
                    <tr>
                         <th>Title</th>
                         <th>Subject</th>
                         <th>Published</th>
                         <th>Action</th>
                    </tr>
               </thead>
               <tbody>
                    <tr v-for="note in notes" :key="note.id">
                         <td><router-link :to="{name: 'note.show', params: {slug: note.slug}}">{{note.title}}</router-link></td>
                         <td>{{note.subject}}</td>
                         <td>{{note.published}}</td>
                         <td>
                              <router-link :to="{name: 'note.edit',params:{slug: note.slug}}" class="btn btn-success">Edit</router-link>
                         </td>
                    </tr>
               </tbody>
          </table>
     </div>
</template>

<script>
export default {
     data(){
          return {
               notes: []
          }
     },
     mounted(){
          axios.get('/api/notes')
          .then(res => {
               this.notes = res.data.data
               console.log(res.data.data)
          })
     }
}
</script>
