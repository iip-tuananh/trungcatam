<template>
  <div>
      <h3 class="page-title">Quản lý banner</h3>
      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body" >
              <div class="row" v-for="(item, key) in objData">
                <div class="col-md-4">
                  <div class="image-row">
                    <div class="form-group">
                      <label>Ảnh Nhỏ</label>
                      <image-upload type="avatar" :oldImage="item.images[0]" v-model="item.images[0]" :title="'banner-trang-chu-1'"></image-upload>
                    </div>
                    <div class="form-group">
                      <label>Ảnh To</label>
                      <image-upload type="avatar" :oldImage="item.images[1]" v-model="item.images[1]" :title="'banner-trang-chu-2'"></image-upload>
                    </div>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="form-group">
                    <label>Tiêu đề (Bỏ trống nếu là banner nhỏ)</label>
                    <label style="float: right;cursor: pointer" title="Xóa banner" v-if="key != 0" @click="removeObjBanner(key)">
                      <vs-icon icon="clear"></vs-icon>
                    </label>
                    <vs-input
                      type="text"
                      v-model="item.title"
                      size="default"
                      placeholder="Tiêu đề banner"
                      class="w-100"
                    />
                  </div>
                  <div class="form-group">
                    <label>Mô tả</label>
                    <label style="float: right;cursor: pointer" title="Xóa banner" v-if="key != 0" @click="removeObjBanner(key)">
                      <vs-icon icon="clear"></vs-icon>
                    </label>
                    <vs-input
                      type="text"
                      v-model="item.description"
                      size="default"
                      placeholder="Mô tả banner"
                      class="w-100"
                    />
                  </div>
                  <div class="form-group">
                    <label>Link</label>
                    <label style="float: right;cursor: pointer" title="Xóa banner" v-if="key != 0" @click="removeObjBanner(key)">
                      <vs-icon icon="clear"></vs-icon>
                    </label>
                    <vs-input
                      type="text"
                      v-model="item.link"
                      size="default"
                      placeholder="Link banner"
                      class="w-100"
                    />
                  </div>
                  <div class="form-group">
                    <label>Trạng thái</label>
                    <vs-select v-model="item.status"
                  >
                      <vs-select-item  value="1" text="Hiện" />
                      <vs-select-item  value="0" text="Ẩn" />
                      <vs-select-item  value="2" text="Banner nhỏ" />
                    </vs-select>
                  </div>
                </div>
                <hr style="border: 0.5px solid #04040426; width: 100%;">
              </div>
              <vs-button color="primary" @click="saveBanners">Lưu</vs-button>
              <vs-button color="success" @click="addObjBanner">Thêm banner</vs-button>
            </div>
          </div>
        </div>
      </div>
    <!-- content-wrapper ends -->
  </div>
</template>


<script>
import { mapActions } from "vuex";
import { required } from "vuelidate/lib/validators";
export default {
  name: "product",
  data() {
    return {
      objData:[
        {
          images: ["", ""], // Sửa thành mảng 2 ảnh
          status:1,
          link:"",
          title:"",
          description:"",
        }
      ] 
    };
  },
  components: {},
  computed: {},
  watch: {},
  methods: {
    ...mapActions(["saveBanner", "loadings","listBanner"]),
    saveBanners(){
      this.loadings(true);
      // Gửi cả mảng images
      const data = this.objData.map(item => ({
        images: item.images, // gửi mảng 2 ảnh
        title: item.title,
        description: item.description,
        link: item.link,
        status: item.status
      }));
      this.saveBanner({data}).then(response => {
        this.loadings(false);
        this.$success('Sửa banner thành công');
      }).catch(error => {
        this.loadings(false);
        this.$error('Sửa banner thất bại');
      })
    },
    addObjBanner(){
      this.objData.push({
        images: ["", ""], // Sửa thành mảng 2 ảnh
        status:1,
        link:"",
        title:"",
        description:"",
      });
    },
    removeObjBanner(i){
      this.objData.splice(i, 1);
    },
    listBanners(){
      this.loadings(true);
      this.listBanner().then(response => {
        this.loadings(false);
        // Đảm bảo mỗi banner đều có đủ trường
        this.objData = response.data.map(item => ({
          images: Array.isArray(item.images) ? item.images : ["", ""],
          title: item.title || "",
          description: item.description || "",
          link: item.link || "",
          status: typeof item.status !== "undefined" ? item.status : 1
        }));
      }).catch(error => {
        this.loadings(false);
      })
    }
  },
  mounted() {
    this.listBanners();
  }
};
</script>

<style scoped>
.image-row {
  display: flex;
  gap: 16px;
}
.image-row .form-group {
  flex: 1;
  margin-bottom: 0;
}
.image-row img {
  max-width: 100px;
  max-height: 80px;
  object-fit: contain;
  display: block;
  margin: 0 auto;
}
/* .avatar img {
    width: 150px;
    height: 150px;
    display: block;
    -o-object-fit: cover;
    object-fit: cover;
} */
</style>