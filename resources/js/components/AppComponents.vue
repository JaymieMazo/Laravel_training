<template>
<v-container fluid>
		<v-card color="#FFFBE6">
            <v-tabs
				v-model="tab_index"
				background-color="transparent"
				color="#356859"
				grow
			>
                    <template v-for ="(item , index ) in tabs_name">
                        <v-tab :key ="index" style ="font-weight:bold;" >
                             {{item}}
                         </v-tab> 
                    </template>
			</v-tabs>
			<company-component v-if="tabs_index ==0"></company-component>
			<department-component v-if="tabs_index ==0"></department-component>
		<v-card>
<v-container>
</template>

<script>
    import CompanyComponent from './CompanyComponents.vue';
    import DepartmentComponent from './CompanyComponents.vue';
   

export default{ 
    components:{
            CompanyComponent,
            DepartmentComponent


    }, 
        data(){
              return{

                  tab_index:[],
                  tabs_name:[],

        }
    }
}
</script>