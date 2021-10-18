<template>
    <div class="add-item">
        <input type="text" v-model = "item.name"/>
        <font-awesome-icon 
        icon="plus-square"
        v-on:click = "addItem()"
        :class="[item.name ? 'active' : 'inactive', 'plus']"
        />
    </div>
</template>

<script>
export default {
    data:function(){
        return {
            item: {
                name: ""
            }
        }
    },
    methods: {
        addItem() {
            if(this.item.name == '') {
                return
            }
            axios.post('api/items', {name: this.item}).then(response => {
                if(response.status == 201) {
                    this.item.name = "";
                    this.$emit('reloadList');
                }
            })
            .catch(error => {
                console.log(error);
            })
        }
    }
}
</script>

<style scoped>
.add-item {
    display: flex;
    justify-content: center;
    align-items: center;
}
input {
    background: #f7f7f7;
    border: 0px;
    outline: none;
    padding: 5px;
    margin-right: 10px;
    width: 100%;
}
.plus {
    font-size: 20px;
}
.active {
    color: #00CE25;
}
.inactive {
    color: #999999
}
</style>