<template>
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title" >Danh sách sản phẩm</h4>
            <p class="card-description">Thêm mới hoặc sửa sửa sản phẩm</p>

            <router-link class="nav-link" :to="{name:'createProduct'}">
              <vs-button type="gradient" style="float:right;">Thêm mới</vs-button>
            </router-link>
            <div class="row">
              <div class="col-4">
                <div class="form-group">
                <vs-select
                  class="selectExample"
                  v-model="category"
                  placeholder="Danh mục"
                  @change="searchProduct()"
                >
                <vs-select-item
                    value="0"
                    text="Không danh mục"
                  />
                  <vs-select-item
                    :value="item.id"
                    :text="JSON.parse(item.name)[0].content"
                    v-for="(item, index) in cate"
                    :key="'f' + index"
                  />
                </vs-select>
              </div>
              </div>
              <div class="col-8">
                <div class="form-group">
                  <vs-input icon="search" v-model="keyword" @keyup="searchProduct()" style="width: 100%;"/>
                </div>
                
              </div>
            </div>
            
            

            <vs-table stripe :data="list" max-items="40" pagination>
              <template slot="thead">
                <vs-th>STT</vs-th>
                <vs-th>Ảnh sản phẩm</vs-th>
                <vs-th>Tên sản phẩm</vs-th>
                <vs-th>Kho</vs-th>
                <vs-th>Số lượng</vs-th>
                <vs-th>Hành động</vs-th>
              </template>
              <template slot-scope="{data}">
                <vs-tr :key="indextr" v-for="(tr, indextr) in data">
                  <vs-td>{{ indextr+1 }}</vs-td>
                  <vs-td ><vs-avatar size="large" :src="JSON.parse(tr.images)[0]"/></vs-td>
                  <vs-td>{{ tr.name }}</vs-td>
                  <vs-td v-if="tr.cate != null">{{JSON.parse(tr.cate)[0].content}}</vs-td>
                  <vs-td v-if="tr.cate == null">--Trống---</vs-td>
                  <vs-td >{{tr.qty}}</vs-td>
                  <vs-td >
                    <router-link :to="{name:'edit_product',params:{id:tr.id}}">
                      <vs-button
                        vs-type="gradient"
                        size="lagre"
                        color="success"
                        icon="edit"
                      ></vs-button>
                    </router-link>
                    <vs-button vs-type="gradient" size="lagre" color="red" icon="delete_forever" @click="confirmDestroy(tr.id)"></vs-button>
                  </vs-td>
                </vs-tr>
              </template>
            </vs-table>
          </div>
        </div>
      </div>
    </div>
</template>


<script>
import Swal from "sweetalert2";
import { mapActions } from "vuex";
export default {
  data() {
    return {
      list:[],
      cate:[],
      keyword:"",
      category:"",
      objDel:{
        id_item:"",
        slug:"",
      }
      
    };
  },
  components: {},
  computed: {},
  watch: {},
  methods: {
    ...mapActions(['listProduct','deleteId','loadings','listCate']),
    listProducts(){
      this.loadings(true);
      this.listProduct({ keyword: this.keyword, cate: this.category })
      .then(response => {
          this.loadings(false);
          this.list = response.data;
      }).catch(err => {
          this.loadings(false);
          this.list = err.data;
      });
    },
    searchProduct() {
      if (this.timer) {
        clearTimeout(this.timer);
        this.timer = null;
      }
      this.timer = setTimeout(() => {
          this.listProduct({ keyword: this.keyword, cate: this.category })
          .then(response => {
            this.list = response.data;
          });
      }, 800);
    },
    destroy(){
      this.deleteId(this.objDel).then(response => {
        this.listProducts();
        this.$success('xóa thành công');
      });
    },
    confirmDestroy(id,slug){
      this.objDel.id_item = id;
      this.$vs.dialog({
        type:'confirm',
        color: 'danger',
        title: `Bạn có chắc chắn`,
        text: 'Xóa sản phẩm này',
        accept:this.destroy
      })
    }
  },
  mounted() {
    this.listProducts();
    this.listCate().then((response) => {
      this.loadings(false);
      this.cate = response.data;
    });
  }
};
</script>