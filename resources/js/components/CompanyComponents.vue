<template>
<v-card>
  
  <v-row  class="pa-2" >
        <v-col cols="5" >
        <v-text-field   dense  type="text" placeholder="Enter company Name" v-model="company_name_input">   </v-text-field>
        </v-col>
        
        <v-col >
        <v-btn  type="submit" color="primary"  @click="save()"  dense> Submit  </v-btn>
        </v-col>
</v-row>


              <v-simple-table >
                <template v-slot:default>
                  <thead >
                    <tr >
                      <th class="text-left">Company Code</th>
                      <th class="text-left">Company Name</th>  
                      <th class="text-left">Created Date</th>
                      <th class="text-left">Updated Date</th>
                      <th class="text-left">Updated By</th>
                    </tr>
                  </thead>
                  <tbody>

                    <tr
                      v-for="(item, index)  in companies"  
                      :key="item.company_code"
                    >

                      <td>{{ index + 1 }}</td>
                      <td>{{ item.company_name }}</td>
                      <td>{{ item.created_at }}</td>
                      <td>{{ item.updated_at }}</td> 
                   <td>{{ item.employee_name }}</td>
                    </tr>
                  </tbody>
                </template>
              </v-simple-table>   

  </v-card>
</template>

<script>
export default {
     data () {
      return {
        companies: [],
        title:['Company Code' , 'Company Name'  ], 
           company_name_input:null,
          }
      }, 

      created(){
       axios.get('company').then(res=>{
         this.companies=res.data
         console.log(this.companies)
       })
      },


  methods:{
    save(){
      alert(this.company_name_input);
      axios.post('company' , {company_name: this.company_name_input})
      .then(res=>{
        if(res.data.length>0 ){
          this.companies=res.data
        }
      })
    }
  }
}
</script> 