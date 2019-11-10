<template>
    <div class="container">
        
                <div class="card">
                    <div class="card-header">
                    	<router-link to="/" class="btn btn-info float-left">Kembali</router-link>
                    </div>

                    <div class="card-body">
                       	<p>{{kontaks.nama}}</p>
                       <p>{{kontaks.noTelp}}</p>
                       <p>{{kontaks.email}}</p>
                    </div>
                </div>
           
    </div>
</template>

<script>

export default {
  data() {
    return {
      kontaks: [],
      errors: []
    }
  },
  
  created() {
  let id= this.$route.params.id;
    axios.get('/tambah/'+id)
    .then(response => {
        console.log(response)
      this.kontaks = response.data
    })
    .catch(e => {
      this.errors.push(e)
    })
    }
  
}
</script>