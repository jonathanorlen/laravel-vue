<template>
  <button ref="deleteNote" @click="destroyNote" class="btn btn-danger">Delete</button>
</template>

<script>
export default {
     props: ['endpoint'],
     mounted(){

     },
     methods: {
          async destroyNote() {
               let q = window.confirm("Are you sure");
               if(q == true){
                    let res = await axios.delete(`/api/notes/delete/${this.endpoint}`)
                    if(res.status == 200){
                         this.$toasted.show('Note deleted', {
                              type: 'success',
                              duration: 3000
                         })

                         console.log(this.$refs.deleteNote.parentNode.parentNode.remove())
                    }else {
                         this.$toasted.show('Something went wrong', {
                              type: 'error',
                              duration: 3000
                         })
                    }
               }
          }
     }
}
</script>

<style>

</style>