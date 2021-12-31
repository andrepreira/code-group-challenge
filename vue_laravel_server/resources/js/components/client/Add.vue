<template>
        <div class="row">
                <div class="col-12">
                        <div class="card">
                                <div class="card-header">
                                        <h4>Add Client</h4>
                                </div>
                                <div class="card-body">
                                        <form @submit.prevent="create">
                                                <div class="row">
                                                        <div class="col-12 mb-2">
                                                                <div class="form-group">
                                                                        <label>Nome</label>
                                                                        <input type="text" class="form-control" v-model="client.nome">
                                                                </div>
                                                        </div>
                                                        <div class="col-12 mb-2">
                                                                <div class="form-group">
                                                                        <label>Cpf</label>
                                                                        <input type="text" class="form-control" v-model="client.cpf">
                                                                </div>
                                                        </div>
                                                        <div class="col-12 mb-2">
                                                                <div class="form-group">
                                                                        <label>Email</label>
                                                                        <input type="text" class="form-control" v-model="client.email">
                                                                </div>
                                                        </div>
                                                        <div class="col-12 mb-2">
                                                                <div class="form-group">
                                                                        <label>Telefone</label>
                                                                        <input type="text" class="form-control" v-model="client.telefone">
                                                                </div>
                                                        </div>
                                                        <div class="col-12 mb-2">
                                                                <div class="form-group">
                                                                        <label>Endereço</label>
                                                                        <input type="text" class="form-control" v-model="client.endereco">
                                                                </div>
                                                        </div>
                                                        <div class="col-12">
                                                                <button type="submit" class="btn btn-primary">Save</button>
                                                        </div>
                                                </div>
                                        </form>
                                </div>
                        </div>
                </div>
        </div>
</template>

<script>
export default {
        name: "add-client",
        data(){
                return {
                        client:{
                                nome:"",
                                cpf:"",
                                email:"",
                                telefone:"",
                                endereco:""
                        }
                }
        },
        methods:{
                async create(){
                        await this.axios.post('/api/client', this.client).then(response=>{
                                this.$router.push({name: "clientList"})
                        }).catch(error=>{
                                console.log(error)
                        })
                }
        }
}
</script>
