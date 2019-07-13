<template>
    <div class="col-xs-12 col-sm-6">
        <ul class="list-group">
            <li class="list-group-item"
             style="cursor:pointer"
             @click="serverSelected"   
             >
                Server #{{ server.id }}
            </li>
        </ul>
    </div>
</template>

<script>
    import {serverBus} from '../../app.js';
    export default{
        props: ['server'],
        methods: {
            serverSelected(){
                serverBus.$emit('serverSelected',this.server);
            }

        }
    }
</script>

<style>

</style>
