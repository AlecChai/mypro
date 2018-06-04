/**
 * Created by Administrator on 2017/3/8.
 */
var Main = {
  data: function () {
    return {
      spanLeft: 5,
      isDisabled: true,
      opened: ['1'],
      isrc: 'components/home/home.html'
    }
  },
  methods: {
    toggleClick: function () {
      if (this.spanLeft === 5) {
        this.spanLeft = 1;
        this.isDisabled = false;
      } else {
        this.spanLeft = 5;
        this.isDisabled = true;
      }
    },
    changeUrl: function (res) {
      this.isrc = res.index;
    }
  },
  created: function () {
    //判断是否为ie浏览器
    if(!!window.ActiveXObject || "ActiveXObject" in window) {
      alert('为了更好的使用本系统，强烈建议使用谷歌、火狐浏览器');
    };
  }

};
var Ctor = Vue.extend(Main);
new Ctor().$mount('#app');

