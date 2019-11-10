<template>
	<div class="card">
		<div class="card-header">
			<div class="float-left">

                <input type="text" v-model="search" placeholder="Cari.." class="form-control"></input>
                
            </div>
            <button @click.prevent="cariKontak" class="btn btn-success" v-on:click="deleteKontak(kontak.id, index)">search</button>
			<router-link to="/create" class="btn btn-info float-right">Tambah Data Kontak</router-link>
		</div>
		<div class="card-body">
		<div v-if="showsearch==true">
			<table class="table table-hover">
		    <thead>
		      <tr>
		        <th>Nama </th>
		        <th>Nomor Telepon</th>
		        <th>Email</th>
		        <th>Aksi</th>
		      </tr>
		    </thead>
		    <tbody>
		      <tr v-for="cari in kontaks" v-bind:key="cari.id">
		        <td>{{cari.nama}}</td>
		        <td>{{cari.noTelp}}</td>
		        <td>{{cari.email}}</td>
		        <td>
		        	<router-link :to="{name:'readKontak', params:{id:cari.id}}" class="btn btn-info">Show</router-link>
		        	<router-link :to="{name:'editKontak', params:{id:cari.id}}" class="btn btn-warning">Edit</router-link>
		        	<button class="btn btn-danger" v-on:click="deleteKontak(cari.id, index)">Hapus</button>
		        </td>
		      </tr>
		    </tbody>
		  </table>
		</div>
		<div v-if="showsearch==false">
		 <table class="table table-hover">
    <thead>
      <tr>
        <th>Nama </th>
        <th>Nomor Telepon</th>
        <th>Email</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="kontak, index in kontaks">
        <td>{{kontak.nama}}</td>
        <td>{{kontak.noTelp}}</td>
        <td>{{kontak.email}}</td>
        <td>
        	<router-link :to="{name:'readKontak', params:{id:kontak.id}}" class="btn btn-info">Show</router-link>
        	<router-link :to="{name:'editKontak', params:{id:kontak.id}}" class="btn btn-warning">Edit</router-link>
        	<button class="btn btn-danger" v-on:click="deleteKontak(kontak.id, index)">Hapus</button>
        </td>
      </tr>
    </tbody>
  </table>
  	</div>
		</div>
	</div>
</template>
<script>
import axios from 'axios';

export default {
  data() {
    return {
      kontaks: [],
      errors: [],
      search:'',
      showsearch: false,
      

    }
  },

  created() {
    axios.get('/tambah')
    .then(response => {
      this.kontaks = response.data
    })
    .catch(e => {
      this.errors.push(e)
    })

  },
  methods:{

  deleteKontak(id, index) {
  if(confirm("Click 'ok' to delete.")){

  
    axios.delete('/tambah/' + id)
    .then(response => {
        console.log(response)
      this.kontaks.splice(index,1);
    })
    .catch(e => {
      this.errors.push(e)
    })
    }
    },
    cariKontak(id, index) {
    	fetch('/api/kontak/search?q='+this.search)
    	.then(res => res.json())
    	.then(res => {
    		this.kontaks=res;
    		this.search='';
    		this.showsearch=true;
    	})
    	.catch(err=>{
    		console.log(err);
    	})
    }
  }
}
</script>