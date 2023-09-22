<template>
    <div v-for="item in items" :key="item.id">
        <list-item
        :item="item"
        class="item"
        />
    </div>
</template>
<style scoped>
.item{
    background: #e6e6e6;
    padding: 5px;
    margin-top:5px ;
}
</style>
<script>
import axios from 'axios'
    export default{
        props:['items'],
        methods:{
            update (){
                axios.put('/api/item/'+this.item.id,{
                    item:this.item
                })
                .then(response =>{
                    if(response.status==200){
                        this.$emit('item changed');
                    }
                })
                .catch(error =>{
                    console.log('errorr')
                })
            }
        }


    }
</script>