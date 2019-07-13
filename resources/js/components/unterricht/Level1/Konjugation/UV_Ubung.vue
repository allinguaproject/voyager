<template>
    <div>
    <div class="row">
        <div class="col-md-9">  
            
           
                   <table>
                       <tbody>
                         <tr v-for="(post,index) in posts">
                           
                            <template v-for="(postpart,indexpart) in post">   
                                <td>
                                    <template v-if="postpart.styling.Content==1">
                                        <span style="color:red;">{{postpart.content.Content}}</span>
                                    </template>
                                    <template v-else>
                                        <span style="color:black;">{{postpart.content.Content}}</span>
                                    </template>
                                </td>
                            </template>
                            
                         </tr>
                        </tbody>
                    </table>
        </div>

            

    
        <div class="col-md-3">
            <div class="card" >

                <div class="card-body">
                    <h5 class="card-title">Nützliche Links</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Siehe auch</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link">Beispiel-link</a>
                    <a href="#" class="card-link">Beispiel-link2</a>
                </div>
            </div>

        </div>




    </div>
    <div class="row" style="margin-top:20px;">
        <div class="col-md-9 ">
            <div class="subcard" >
                    <h5 class="mainBoxTitle">Weitere Beispiele</h5>
                    <div class="">
                        <button @click="prevPage"><div  class="previousBtn"></div></button>
                        <button @click="nextPage" ><div class="nextBtn"></div></button>
                    </div>
            </div>
        </div>    
    </div>   
    </div>


</template>
<script>
    import table1 from './Cards/kon_table1.vue';
    import table2 from './Cards/kon_table2.vue';

export default {
    created() {
        this.fetchData();	
    },
    data:function(){
        return {
            pageNumber: 0,
            content :table1,
            posts: []
        }
    },
    methods: {
        nextPage: function () {
            this.pageNumber=this.pageNumber+1;
            //this.content=this.tables[this.pageNumber];
        },
        prevPage: function () {
            this.pageNumber=this.pageNumber-1;
            //this.content=this.tables[this.pageNumber];
        },
        fetchData() {
            axios.get('/getdata/lectures/1').then(response => {
                console.log(response);
                this.posts = response.data;
            });
        }
    },
    components:{        
        table1,
        table2
       
    }
}
</script>
<style scoped>
.fade-enter{
        opacity: 0;
    }
.fade-enter-active{
        transition: opacity 1s;
}
.fade-leave{
        /* opacity: 1; */
}
.fade-leave-active{
        transition: opacity 1s;
        opacity: 0;
}


.subcard{
	width: 100%;
	text-align: center;
}
</style>

