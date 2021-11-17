<template>
      <div class="row">
        <div class="col">
            <div>
                <label class="font-weight-bold mb-3 mt-2" for="city">City / Municipality</label>
                    </div>
                        <div>
                            <select  @change="getBarang()" v-model="barangay" class="form-control-lg w-100 border font-weight-bold bg-transparent" name="city">
                                <option v-for="d in city" :value="d.id" class="font-weight-bold">{{d.name}}</option>
                            </select>
                            </div>
                        </div>
                        <div class="col">
                            <div>
                                <label class="font-weight-bold mb-3 mt-2" for="barangay">Barangay</label>
                            </div>
                            <div>
                    <select class="form-control-lg w-100 border font-weight-bold bg-transparent" name="barangay">
                        <option v-for="b in barang" :value="b.id" class="font-weight-bold">{{b.name}}</option>
                    </select>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            city:{},
            barangay:"",
            barang:{}
        }
    },
    mounted(){
        this.getCity();
    },
    methods:{
        getBarang(){
            axios.get('/getBarang/'+this.barangay)
            .then(data => this.barang = data.data)
            .catch(error => console.log(error))
        },
        getCity(){
            axios.get('/getCity')
            .then(data => this.city = data.data)
            .catch(error => console.log(error))
        }
    }
}
</script>