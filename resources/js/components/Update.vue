<template>
    <div class="container">
        
                <div class="card">
                    <div class="card-header" style="text-align:center">Edit Kontak </div>

                    <div class="card-body">
                        <form v-on:submit="editKontak()">
                            <div class="form-group">
                                <input type="text" v-model="kontaks.nama" placeholder="Nama lengkap" class="form-control"></input>
                            </div>
                            <div class="form-group">
                                <input type="text" v-model="kontaks.noTelp" placeholder="Nomor Telepon" class="form-control"></input>
                            </div>
                            <div class="form-group">
                                <input type="text" v-model="kontaks.email" placeholder="email" class="form-control"></input>
                            </div>
                            <div class="form-group">
                                <router-link to="/" class="btn btn-warning">Batal</router-link>
                                <button class="btn btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
           
    </div>
</template>

<script>
import axios from 'axios';

export default {
  data:function() {
    return {
      kontaks: {
        nama:'',
        noTelp:'',
        email:''
      },
      errors: []
    }
  },
  created() {
  let id= this.$route.params.id;
    axios.get('/tambah/'+id+ '/edit')
    .then(response => {
        console.log(response)
      this.kontaks = response.data
    })
    .catch(e => {
      this.errors.push(e)
    })
    },
  methods:{
  editKontak() {
  let id= this.$route.params.id;
    axios.patch('/tambah/' + id, this.kontaks)
    .then(response => {
        console.log(response)
        this.$router.push({path:'/'})
      this.kontaks = response.data
    })
    .catch(e => {
      this.errors.push(e)
    })
    }
  }
}
</script>
