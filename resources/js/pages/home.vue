<template>
    <div>
        <h1 class="" style="text-align: center;">Todo List</h1>
        <div class="row">
            <div class="col-md-4"></div>
            <input type="text" v-model="items.name" class="col-md-3 ">
            <button class="col-md-1 btn btn-primary" :class="[items.name ? 'active' : 'inactive']" @click="addItem()"><i
                    class="fas fa-plus"></i></button>
            
                    <p style="text-align: center;">List Item</p>
            <div class="row"  v-for="item in items" :key="item.id">
                <div class="col-md-3">
                    </div>
                <div class="col-md-3">
                    <input type="checkbox" class="col-md-1" @change="update()" v-model="item.completed" />

               

                    <span class="col-md-2" style="width: 175px;background: salmon; height: 50px; margin: 5px; color: black;" :class="[item.completed ?  'completed' : '', 'itemText']">{{ item.name }}</span>
                
                    <button @click="deleteTag(item.id)" class="fa fa-trash col-md-1"></button>
                 </div>
                 <div class="col-md-3">
                    </div>
            </div>
        </div>
    </div>
</template>
<style scoped>
*{
    background: #26c93c;
}
.completed {
    text-decoration: line-through;
    color: #999999;
}

.itemText {
    width: 100%;
    margin-left: 20px;
}

.item {
    display: flex;
    justify-content: center;
    align-items: center;
}

.active {
    color: green;
    display: block;
}

.inactive {
    color: #999;
    display: none;
}
</style>
<script>
import axios from 'axios';
export default {
    data: function () {
        return {
            data:[],
            items: {
                name: '',
                id:''
            }
        }
    },
    mounted() {
        this.getlist()
    },
    methods: {
        addItem() {
            if (this.items.name == '') {
                return;
            }
            axios.post('/api/item/store', this.items)
                .then(response => {
                    if (response.status = 201) {
                        this.items.name = "";
                    }
                })
                .catch(error => {
                    console.log('error')
                })
        },
        getlist(){
                axios.get('/api/items').then(responce=>{
                    this.items=responce.data
                })
                .catch(error=>{
                    console.log(error);
                })
            },
        update (){
                axios.put('/api/item/'+this.items.id,{
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
            },
        remove(id) {
            axios.delete('/api/item/'+this.items.id).then(response => {
                if(response.status=200)
                {
                    this.$emit('itemchanged');
                }

            }).catch(error =>{
                    console.log('errorr')
                })
        },
        deleteTag(id) {
        axios.delete('/api/item/' + id).then(response => {
            // Handle success
            // Update the UI by removing the deleted post
            this.items = null;
        })
    },

    }
}
</script>