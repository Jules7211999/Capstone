<template>
    <div class="row w-100 h-100">
        <addpost  @submitModal="refresh()"/>
      <div class="mt-5">
        {{post}}
      </div>
         
    </div>
    
</template>


<script>
import addpost from './AddPost.vue';
export default {
  methods:{
    refresh(){
      location.reload();
    }
  },
components:{addpost},
mounted(){
  axios.get('/getpost')
  .then(data => this.post = data.data)
},
data(){
  return{
    post:{},
    show: null
  }
}

}
</script>

<style scoped>

</style>