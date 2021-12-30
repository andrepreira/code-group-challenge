<template>
        <div class="row">
                <div class="col-12 mb-2 text-end">
                    <router-link :to='{name: "clientAdd"}' class="btn btn-primary">Create</router-link>
                </div>
                <div class="col-12">
                        <div class="card">
                                <div class="card-header">
                                        <h4>Client</h4>
                                </div>
                                <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                                <th>ID</th>
                                                                <th>Cpf</th>
                                                                <th>Email</th>
                                                                <th>Telefone</th>
                                                                <th>Endereço</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody v-if="clients.length > 0">
                                                            <tr v-for="(client, key) in clients" :key="key">
                                                                    <td>{{ client.id }}</td>
                                                                    <td>{{ client.cpf }}</td>
                                                                    <td>{{ client.email }}</td>
                                                                    <td>{{ client.telefone }}</td>
                                                                    <td>{{ client.endereco }}</td>
                                                                     <td>
                                                                        <router-link :to='{name:"clientEdit",params:{id:client.id}}' class="btn btn-success">Edit</router-link>
                                                                        <button type="button" @click="deleteClient(client.id)" class="btn btn-danger">Delete</button>
                                                                    </td>
                                                            </tr>
                                                    </tbody>
                                                    <tbody v-else>
                                                            <tr>
                                                                    <td colspan="5" align="center">No Clients Found</td>
                                                            </tr>
                                                    </tbody>
                                            </table>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
</template>

<script>
export default {
        name: "clients",
        data(){
                return {
                        clients: []
                }
        },
        mounted(){
            this.getClients()
        },
        methods:{
            async getClients(){
                    await this.axios.get('/api/client').then(response=>{
                            this.clients = response.data
                    }).catch(error=>{
                            console.log(error)
                            this.clients = []
                    })
            },
            deleteClient(id){
                    if(confirm("Are you sure to delete this client ?")){
                            this.axios.delete(`/api/client/${id}`).then(response=>{
                                    this.getClients()
                            }).catch(error=>{
                                    console.log(error)
                            })
                    }
            }
        }
}
</script>
