<template>
        <div class="row">
                <div class="col-12">
                        <div class="card">
                                <div class="card-header">
                                        <h4>Update  Client</h4>
                                </div>
                                <div class="card-body">
                                        <form @submit.prevent="update">
                                                <div class="row">
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
                                                                <button type="submit" class="btn btn-primary">Update</button>
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
        name: "update-client",
        data(){
                return {
                        client:{
                                cpf:"",
                                email:"",
                                telefone:"",
                                endereco:"",
                                _method:"patch"
                        }
                }
        },
        mounted(){
            this.showClient()
        }
        ,
        methods:{
                async showClient(){
                        await this.axios.get(`/api/client/${this.$route.params.id}`).then(response=>{
                                const { cpf, email, telefone, endereco } = response.data
                                this.client.cpf = cpf
                                this.client.email = email
                                this.client.telefone = telefone
                                this.client.endereco = endereco
                        }).catch(error=>{
                                console.log(error)
                        })
                },
            async update(){
                    await this.axios.post(`/api/client/${this.$route.params.id}`, this.client).then(response=>{
                        this.$router.push({name: "clientList"})
                    }).catch(error=>{
                            console.log(error)
                    })
            }
        }
}
</script>
