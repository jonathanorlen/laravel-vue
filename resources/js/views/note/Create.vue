<template>
  <div class="container">
       <div class="row">
            
                           <div class="alert alert-success" v-if="success">
                                {{ success }}
                           </div>
            <div class="col-md-6">
                 <div class="card">
                      <div class="card-header">New Notes</div>
                      <div class="card-body">
                           <form action="" method="post" @submit.prevent="store">
                                <div class="form-group">
                                   <label class="title">Title</label>
                                   <input type="text" v-model="form.title" id="" class="form-control">
                                   <div class="text-danger mt-2" v-if="errors.title">
                                        {{ errors.title[0]}}
                                   </div>
                                </div>
                                <div class="form-group">
                                     <label class="title">Subject</label>
                                     <select class="form-control" v-model="form.subject" id="">
                                          <!-- <option value="">Choose</option> -->
                                          <option v-for="subject in subjects" :value="subject.id" :key="subject.id">
                                               {{ subject.name }}
                                          </option>
                                     </select>
                                     <div class="text-danger mt-2" v-if="errors.subject">
                                        {{ errors.subject[0]}}
                                   </div>
                                </div>
                                <div class="form-group">
                                     <label for="description">Description</label>
                                     <textarea id="description" v-model="form.description" cols="30" rows="10" class="form-control"></textarea>
                                   <div class="text-danger mt-2" v-if="errors.description">
                                        {{ errors.description[0]}}
                                   </div>
                                </div>
                                <button type="submit">Submit</button>
                           </form>
                      </div>
                 </div>
            </div>
       </div>
  </div>
</template>

<script>
export default {
     data() {
          return {
               form: {
                    title: '',
                    description: '',
                    subject: ''
               },
               success: '',
               subjects: [],
               errors: []
          }
     },

     mounted(){
          this.getSubjects();
     }, 

     methods: {
          async getSubjects(){
               let response = await axios.get('http://127.0.0.1:8000/api/subject/')
               if(response.status == 200){
                    this.subjects = response.data;
               }
          },

          async store() {
               axios.post('/api/notes/create-new-note', this.form)
               .then( res => {     
                    if(res.status == 200){
                         this.form.title = ""
                         this.form.decoration = ""
                         this.form.title = ""
                         this.errors = ""
                         this.$toasted.show(res.data.message, {
                              type: 'success',
                              duration: 3000
                         })
                    }
               }).catch(err => {
                    this.$toasted.show('Something went wrong', {
                              type: 'error',
                              duration: 3000
                         })
                    this.errors = err.response.data.errors
               })
          }
     }
}
</script>

<style>

</style>