<template>
    <div>
        <p>List Item</p>
        <input
            type="checkbox"
            @change="update()"
            v-model="items.completed"
            />
            <span :class="[item.completed ? 'completed':'','itemText']">{{ item.name }}</span>
            <button @click="removeItem()" class="trashcan"></button>
            <i class="fa fa-trash"></i>
    </div>
</template>
<style scoped>
    .completed{
        text-decoration: line-through;
        color: #999999;
    }
    .itemText{
        width: 100%;
        margin-left: 20px;
    }
    .item{
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
<script>
import axios from 'axios'
    export default{
        data:function(){
            return {
                item:[]
            }
        },
        methods:{
            getlist(){
                axios.get('/api/items').then(responce=>{
                    this.items=responce.data
                })
                .catch(error=>{
                    console.log(error);
                })
            }
        }
    }
</script>