<template>


<v-card>
  <v-row>
      <v-col>
        <v-select
              v-model="company_code"
              :items="companies"
              item-text="company_name"
              item-value="company_code"
              label="Select Company">
      </v-select>

      <v-select
                solo
                dense
                class="mt-3"
                v-model="department_code"
                label="Select Department"
                :items="filteredDepartment"
                item-text="department_name"
                item-value="department_code"
                background-color="#FFEBE6"
          >
       </v-select>
        </v-col>
</v-row>


 <v-simple-table>
            <template v-slot:default>
                  <thead>
                          <tr>
                                  <th class="text-left"> No</th>
                                  <th class="text-left">Company</th>
                                  <th class="text-left">Department</th>
                                  <th class="text-left">Created Date</th>
                                  <th class="text-left">Updated Date</th>
                                  <th class="text-left">updated By</th>
                          </tr>
                  </thead>

                  <tbody>
                        <tr
                          v-for="(item, index)  in departments"  
                          :key="index"
                        >
                                <td>{{ index + 1 }}</td>
                                  <td>{{ item.company_name }}</td>
                                <td>{{ item.department_name }}</td>
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
          companies:[],
          departments: [],
          company_code:null,
          department_name:null,
        }
     }, 
  

     created(){
            axios.get('company').then(res1=>{
                this.companies=res1.data
                    console.log(this.companies)
                axios.get('department').then(res2=> {
                     this.departments =res2.data
                        console.log(this.departments)
                      axios.get('section').then(res3=> {
                            this.sections=res3.data
                       console.log(this.sections)
                      })
                })
          })
},
    computed:{
            filteredDepartment(){
                    return this.departments.filter(rec=>{
                    return rec.company_code==this.company_code
                    })
            }

    } , 
    methods:{
              save(){
                        axios.post('department'  , {
                          company_code , departmet_code , department_name
                        }).then(res=> {

                                if (res.data.length > 0  ) {
                                  this.departments=res.data
                                }
                        })
              }
    }, 
}



</script>