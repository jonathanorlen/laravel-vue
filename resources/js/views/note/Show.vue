<template>
     <div class="container">
          <h3 class="mt-5">{{ note.title }}</h3>
          <hr>
          <div class="mb-3">
               {{ note.published }} - {{ note.subject }}
          </div>
          {{ note.description }}
     </div>
</template>

<script>
export default {
     data() {
          return {
               note: []
          }
     },

     mounted(){
          this.getNote();
     },

     methods: {
          async getNote(){
               let response = await axios.get('/api/notes/'+this.$route.params.slug);
               this.note = response.data.data;
               console.log(response.data.data);
          }
     }
}
</script>

<style>

</style>