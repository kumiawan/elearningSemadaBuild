module.exports = {
  proxy: "localhost:8000", // Alamat dan port server PHP
  files: ["*.php", "dist/*.css"], // File yang dipantau untuk perubahan
  reloadDelay: 500, // Penundaan reload dalam milidetik
  port: 3000, // Port untuk Browsersync
  open: false, // Set ke true jika ingin browser otomatis terbuka
};
