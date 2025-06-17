<template>
  <div>
    <h3 class="page-title">Cài đặt chung</h3>
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="form-group">
              <label>Tên doanh nghiệp</label>
              <vs-input
                type="text"
                size="default"
                class="w-100"
                v-model="objData.company"
              />
            </div>
            <div class="form-group">
              <label>Tên website</label>
              <vs-input
                type="text"
                size="default"
                class="w-100"
                v-model="objData.webname"
              />
            </div>
            <div class="form-group">
              <label>Văn phòng đại diện</label>
              <vs-input
                type="text"
                size="default"
                class="w-100"
                v-model="objData.address1"
              />
            </div>
            <div class="form-group">
              <label>Địa chỉ</label>
              <vs-input
                type="text"
                size="default"
                class="w-100"
                v-model="objData.address2"
              />
            </div>
            <div class="form-group">
              <label>Số điện thoại 1</label>
              <vs-input
                type="text"
                size="default"
                class="w-100"
                v-model="objData.phone1"
              />
            </div>
            <!-- <div class="form-group" style="background-color: #004c83;padding: 20px 10px 10px; border-radius: 5px;">
              <label style="color: white !important;">SĐT Khác</label>

              <div
                v-for="(item, idx) in objData.phone2"
                :key="idx"
                style="
                  display: flex;
                  align-items: center;
                  margin-bottom: 4px;
                  align-items: flex-end;
                  margin-top: 10px;
                "
              >
                <div
                  style="min-width: 70px; margin-right: 8px; font-weight: bold;color: white !important;"
                >
                 SĐT  {{ idx + 1 }}
                </div>
                <vs-input
                  type="text"
                  size="default"
                  class="w-100"
                  v-model="objData.phone2[idx]"
                  placeholder="Nhập số SĐT"
                />
                <vs-button
                  color="danger"
                  size="small"
                  icon="delete"
                  @click="objData.phone2.splice(idx, 1)"
                  style="margin-left: 4px"
                />
              </div>
          
              <div
              style="
                  margin-top: 8px;position: absolute;height: auto;top: 2px;left: 90px;
                "
              >
                <vs-button
                  color="success"
                  size="small"
                  icon="add"
                  @click="addPhone2"
                  :disabled="objData.phone2.length >= 5"
                >
                  Thêm sđt khác ({{ objData.phone2.length }}/5)
                </vs-button>
              </div>
            </div> -->
            <!-- <div class="form-group">
                  <label>Fax</label>
                  <vs-input
                    type="text"
                    size="default"
                    class="w-100"
                    v-model="objData.fax"
                  />
                </div> -->
            <div class="form-group">
              <label>Email</label>
              <vs-input
                type="text"
                size="default"
                class="w-100"
                v-model="objData.email"
              />
            </div>
            <!-- <div class="form-group">
              <label>Facebook</label>
              <vs-input
                type="text"
                size="default"
                class="w-100"
                v-model="objData.facebook"
              />
            </div> -->
            <br />

            <!-- <div class="form-group" style="background-color: #004c83;padding: 20px 10px 10px; border-radius: 5px;">
              <label style="color: white !important;">Zalo</label>

              <div
                v-for="(item, idx) in objData.google"
                :key="idx"
                style="
                  display: flex;
                  align-items: center;
                  margin-bottom: 4px;
                  align-items: flex-end;
                  margin-top: 10px;
                "
              >
                <div
                  style="min-width: 70px; margin-right: 8px; font-weight: bold;color: white !important;"
                >
                  Zalo {{ idx + 1 }}
                </div>
                <vs-input
                  type="text"
                  size="default"
                  class="w-100"
                  v-model="objData.google[idx]"
                  placeholder="Nhập số Zalo"
                />
                <vs-button
                  color="danger"
                  size="small"
                  icon="delete"
                  @click="objData.google.splice(idx, 1)"
                  style="margin-left: 4px"
                />
              </div>
              <div
                style="
                  margin-top: 8px;position: absolute;height: auto;top: 2px;left: 90px;
                "
              >
                <vs-button
                  color="success"
                  size="small"
                  icon="add"
                  @click="addZalo"
                  :disabled="objData.google.length >= 5"
                >
                  Thêm số Zalo ({{ objData.google.length }}/5)
                </vs-button>
              </div>
            </div> -->
            <!-- <div class="form-group">
                  <label>Code Google analytics</label>
                  <vs-input
                    type="text"
                    size="default"
                    class="w-100"
                    v-model="objData.GA"
                  />
                </div> -->
            <div class="form-group">
              <label>Iframe GG map</label>
              <vs-input
                type="text"
                size="default"
                class="w-100"
                v-model="objData.iframe_map"
              />
            </div>
            <div class="form-group">
              <label>Favicon</label>
              <image-upload
                type="avatar"
                :oldImage="objData.favicon"
                v-model="objData.favicon"
                :title="'favicon'"
              ></image-upload>
            </div>
            <div class="form-group">
              <label>Logo</label>
              <image-upload
                type="avatar"
                :oldImage="objData.logo"
                v-model="objData.logo"
                :title="'logo'"
              ></image-upload>
            </div>
            <!-- <div class="form-group">
                  <label>Logo khác</label>
                  <image-upload type="avatar"  :oldImage="objData.logo_footer" v-model="objData.logo_footer" :title="'logo_footer'"></image-upload>
                </div> -->

            <!-- <div class="form-group">
                  <label>Link Popup</label>
                  <vs-input
                    type="text"
                    size="default"
                    class="w-100"
                    v-model="objData.linkpopup"
                  />
                </div> -->
            <!-- <div class="form-group">
                  <label>Trạng thái hiển thị popup</label>
                  <vs-select v-model="objData.statusPopup"
                  >
                      <vs-select-item  value="1" text="Hiện" />
                      <vs-select-item  value="0" text="Ẩn" />
                    </vs-select>
                </div> -->

            <!-- <div class="form-group">
                  <label>Ảnh Header</label>
                  <image-upload type="avatar" :oldImage="objData.imgHeader" v-model="objData.imgHeader" :title="'imgHeader'"></image-upload>
                </div>
                <div class="form-group">
                  <label>Link ảnh header</label>
                  <vs-input
                    type="text"
                    size="default"
                    class="w-100"
                    v-model="objData.linkImgHeader"
                  />
                </div>
                <div class="form-group">
                  <label>Trạng thái hiển thị ảnh header</label>
                  <vs-select v-model="objData.statusImgHeader"
                  >
                      <vs-select-item  value="1" text="Hiện" />
                      <vs-select-item  value="0" text="Ẩn" />
                    </vs-select>
                </div> -->
            <vs-button color="primary" @click="saveSetting">Lưu</vs-button>
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
import ImageMulti from "../_common/upload_image_multi";
import TinyMce from "../_common/tinymce";
export default {
  name: "setting",
  data() {
    return {
      objData: {
        webname: "",
        company: "",
        address1: "",
        address2: "",
        phone1: "",
        phone2: [],
        fax: "",
        email: "",
        facebook: "",
        google: [],
        GA: "",
        fbPixel: "",
        iframe_map: "",
        favicon: "",
        logo: "",
        logo_mobi: "",
        logo_footer: "",
        footer_content: "",
        popupimage: [],
        statusPopup: 0,
        linkpopup: "",
        statusImgHeader: 0,
        imgHeader: "",
        linkImgHeader: "",
      },
    };
  },
  components: {
    TinyMce,
    ImageMulti,
  },
  computed: {},
  watch: {},
  methods: {
    ...mapActions(["postSetting", "loadings", "getSetting"]),
    addPhone2() {
      if (this.objData.phone2.length >= 5) {
        this.$error("Chỉ được nhập tối đa 5 số điện thoại!");
        return;
      }
      this.objData.phone2.push("");
    },
    addZalo() {
      if (this.objData.google.length >= 5) {
        this.$error("Chỉ được nhập tối đa 5 số Zalo!");
        return;
      }
      this.objData.google.push("");
    },
    saveSetting() {
      this.loadings(true);
      // Đảm bảo google là mảng trước khi gửi
      if (!Array.isArray(this.objData.phone2)) {
        this.objData.phone2 = [this.objData.phone2];
      }
      if (!Array.isArray(this.objData.google)) {
        this.objData.google = [this.objData.google];
      }
      this.postSetting(this.objData)
        .then((response) => {
          this.loadings(false);
          this.$success("Cài đặt thành công");
        })
        .catch((error) => {
          this.loadings(false);
          this.$error("Cài đặt thất bại");
        });
    },
    listSettings() {
      this.loadings(true);
      this.getSetting()
        .then((response) => {
          this.loadings(false);
          this.objData = response.data;
          // Đảm bảo google là mảng
          if (Array.isArray(this.objData.google)) {
            // Đã là mảng
          } else if (
            typeof this.objData.google === "string" &&
            this.objData.google.trim() !== ""
          ) {
            try {
              const parsed = JSON.parse(this.objData.google);
              this.objData.google = Array.isArray(parsed)
                ? parsed
                : [this.objData.google];
            } catch (e) {
              this.objData.google = [this.objData.google];
            }
          } else {
            this.objData.google = [];
          }

          if (Array.isArray(this.objData.phone2)) {
            // Đã là mảng
          } else if (
            typeof this.objData.phone2 === "string" &&
            this.objData.phone2.trim() !== ""
          ) {
            try {
              const parsed = JSON.parse(this.objData.phone2);
              this.objData.phone2 = Array.isArray(parsed)
                ? parsed
                : [this.objData.phone2];
            } catch (e) {
              this.objData.phone2 = [this.objData.phone2];
            }
          } else {
            this.objData.phone2 = [];
          }
          // Đảm bảo popupimage là mảng
          this.objData.popupimage = response.data.popupimage
            ? JSON.parse(response.data.popupimage)
            : [];
        })
        .catch((error) => {
          this.loadings(false);
        });
    },
  },
  mounted() {
    this.listSettings();
  },
};
</script>