<template>
<div>
    <h1>Contacts</h1>

    <form action="" @submit.prevent="edit ? updateContact(contact.id) : createContact()">

        <div class="form-group">
            <label>Name</label>
            <input v-model="contact.name" type="text" name="name" class="form-control" />
        </div>

        <div class="form-group">
            <label>Email</label>
            <input  v-model="contact.email" type="text" name="name" class="form-control" />
        </div>


        <div class="form-group">
            <label>Phone</label>
            <input  v-model="contact.phone" type="text" name="name" class="form-control" />
        </div>

         <div class="form-group">
            <button type="submit" name="submit" v-show="!edit" class="btn btn-sm btn-primary"> New Contact</button>
            <button type="submit" name="submit" v-show="edit" class="btn btn-sm btn-warning"> Update Contact</button>
        </div>


      </form>

      <h1>Contacts list</h1>
      <ul  class="list-group">
             <li class="list-group-item" v-for="contact in list">
                     <strong>  {{contact.name}} {{contact.email}} {{contact.phone}}
                         <button class="btn btn-xs btn-primary" @click="showContact(contact.id)"> Edit </button>
                           <button class="btn btn-xs btn-warning" @click="deleteContact(contact.id)"> Delete </button>
                     </strong>
                 </li>
        </ul>
      
</div>
</template>

<script>
    export default {
        mounted() {
        this.fetchContactList();
            console.log('Contacts components loaded')
        },
        data: function(){
           return {
               edit: false,
               list: [],
               contact: {
                   id: '',
                   name: '',
                   email: '',
                   phone: ''
               }
           } 
        },
        methods: {
            fetchContactList: function(){
                console.log("fetching contacts");
                 let self = this;
                axios.get('/api/contact')
                .then(function(response){

                    console.log(response);
                  self.list = response.data;

                })
                .catch(function(error){
                    console.log(error);
                });
            },
            createContact: function(){
             let self = this;
             let params = Object.assign({}, self.contact);
             axios.post('/api/contact/store',params)
             .then(function(){
              self.contact.name = '';
              self.contact.email = '';
              self.contact.phone = '';
              self.edit = false;
              self.fetchContactList();
             })
             .catch(function(error){
                 console.log(error);
             });
            },
            updateContact: function(id){
              console.log('update'+id+' contact');
              let self = this;
             let params = Object.assign({}, self.contact);
             axios.patch('/api/contact/'+id,params)
             .then(function(){
              self.contact.name = '';
              self.contact.email = '';
              self.contact.phone = '';
              self.edit = false;
              self.fetchContactList();
             })
             .catch(function(error){
                 console.log(error);
             });
            },
            showContact: function(id){
              let self = this;
              axios.get('/api/contact/'+id)
              .then(function(response){
                  self.contact.id = response.data.id;
                  self.contact.name = response.data.name;
                  self.contact.email = response.data.email;
                  self.contact.phone = response.data.phone;
                   self.edit = true;

              });

            },
            deleteContact: function(id){
             let self = this;
              axios.delete('/api/contact/'+id)
              .then(function(response){

                   self.edit = false;
                   self.fetchContactList();

              })
              .catch(function(error){
                  console.log(error);
              });

              
            }
        }
    }
</script>
