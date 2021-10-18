<template>
    <div class="todo-list-container">
        <div class="heading">
            <h2 id="title"> Todo List</h2>
            <add-item-form
                v-on:reloadList = "getList()"
            />
        </div>
        <list-view 
            :items="items"
            v-on:reloadList = "getList()"
        />
    </div>
</template>

<script>
import AddItemForm from './AddItemForm.vue'
import ListView from './ListView.vue'
export default {
    components:{
        AddItemForm,
        ListView
    },
    data: function() {
        return {
            items: []
        }
    },
    methods: {
        getList() {
            axios.get('api/items').then(response => {
                this.items = response.data
            }).catch(error => {
                console.log(error);
            })
        }
    },
    created() {
        this.getList();
    }

}
</script>

<style scoped>
.todo-list-container {
    width: 350px;
    margin: auto;
}
.heading {
    background: #e6e6e6;
    padding: 10px;
}
#title {
    text-align: center;
}
</style>