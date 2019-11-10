<template>
    <div class="container">
        
                <div class="card">
                    <div class="card-header" style="text-align:center">Tambah Kontak Baru

                    </div>

                    <div class="card-body">
                        <form v-on:submit="tambahData()" novalidate="true">
                            <div class="form-group">
                                <input type="text" v-model="kontaks.nama" placeholder="Nama lengkap" class="form-control"></input>
                            </div>
                            <div class="form-group">
                                <input type="text" v-model="kontaks.noTelp" placeholder="Nomor Telepon" class="form-control"></input>
                            </div>
                            <div class="form-group">
                                <input type="email" v-model="kontaks.email" placeholder="email" class="form-control"></input>
                                <p v-if="errors.length">
                                    <b>Please correct the following error(s):</b>
                                    <ul>
                                      <li v-for="error in errors">{{ error }}</li>
                                    </ul>
                                  </p>
                            </div>
                            <div class="form-group">
                                <router-link to="/" class="btn btn-warning">Batal</router-link>
                                <button class="btn btn-success">Tambah</button>
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
  methods:{
  tambahData() {
  this.errors = [];
    if(!this.validEmail(this.kontaks.email)){
        this.errors.push("Valid email required.");
    }else{
    axios.post('/tambah', this.kontaks)
    .then(response => {
        
        this.$router.push({path:'/'})
      this.kontaks = response.data
    })
    .catch(e => {
      this.errors.push(e)
      console.log(e);
    })
    }
    },
    validEmail:function(email) {
      var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
    }
  }
}
</script>
