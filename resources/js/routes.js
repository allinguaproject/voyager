import DerArtikel from './components/unterricht/Level1/Artikel/Der.vue'
import DieArtikel from './components/unterricht/Level1/Artikel/Die.vue'
import DasArtikel from './components/unterricht/Level1/Artikel/Das.vue'
import Unregverben from './components/unterricht/Level1/Konjugation/UnregelVerben.vue'
import UV_Ubung from './components/unterricht/Level1/Konjugation/UV_Ubung.vue'

const routes = [
    { path: '/unterricht/Level1/Artikel/Der', component: DerArtikel },
    { path: '/unterricht/Level1/Artikel/Die', component: DieArtikel },
    { path: '/unterricht/Level1/Artikel/Das', component: DasArtikel },
    { path: '/unterricht/Level1/Konjugation/Unregverb', component: Unregverben },
    { path: '/unterricht/Level1/Konjugation/UV_Ubung', component: UV_Ubung }


  ];
   
export default routes;