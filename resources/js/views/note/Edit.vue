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
                           <form action="" method="post" @submit.prevent="update">
                                <div class="form-group">
                                   <label class="title">Title</label>
                                   <input type="text" v-model="form.title" id="" class="form-control">
                                   <div class="text-danger mt-2" v-if="errors.title">
                                        {{ errors.title[0]}}
                                   </div>
                                </div>
                                <div class="form-group">
                                     <label class="title">Subject</label>
                                     <select @change="selectedSubject" class="form-control" id="">
                                          <option :value="form.subjectId" v-text="form.subject"></option>
                                          <template v-for="subject in subjects">
                                             <option v-if="form.subjectId !== subject.id" :value="subject.id" :key="subject.id">
                                                  {{ subject.name }}
                                             </option>
                                          </template>
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
                                <button type="submit">Update</button>
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
               form: {},
               success: '',
               subjects: [],
               errors: [],
               selected: ''
          }
     },

     mounted(){
          this.getSubjects();
          this.getNote();
     }, 

     methods: {
          async getSubjects(){
               let response = await axios.get('http://127.0.0.1:8000/api/subject/')
               if(response.status == 200){
                    this.subjects = response.data;
               }
          },

          async getNote() {
               let response = await axios.get(`http://127.0.0.1:8000/api/notes/${this.$route.params.slug}`);
               this.form = response.data.data
               console.log(response.data.data)
          },

          async update(){
               console.log("update")
               let response = await axios.put(`http://127.0.0.1:8000/api/notes/edit/${this.$route.params.slug}`, this.form)
               if(response.status == 200)
               {
                    this.$toasted.show('Note Updated', {
                              type: 'success',
                              duration: 3000
                         })
               }else{
                    this.$toasted.show('Something went wrong', {
                              type: 'error',
                              duration: 3000
                         })
                    this.$route.push('/notes/table')
               }
          },

          selectedSubject(e){
               this.form['subjectId'] = e.target.value || this.form.subjectId;
          }
     }
}
</script>

<style>

</style>