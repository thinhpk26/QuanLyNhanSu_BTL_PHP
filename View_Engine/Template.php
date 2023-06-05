<?php
    class Template {
        /**
         * 
         * Thư mục views.
         * 
         */
        private $__directory;
        
        /**
         * 
         * Layout của views.
         * Thuộc tính này sẽ có giá trị là view parent - view cần kế thừa của view đang được gọi. 
         * @default null
         * 
         */
        private $__layout;
        
        /**
         * 
         * Các section của layout. VD: content, sidebar, header, footer,... Nói chung ai dùng fw rồi đều sẽ biết
         * 
         */
        private $__sections;
        
        /**
         * 
         * section hiện tại đang xét.
         * @default null
         * 
         */
        private $__current_section;

        private $__directory_Layout;
        public function __construct($directory, $__directory_Layout)
        {
            $this->__setDirectory($directory);
            $this->__setDirectory_Layout($__directory_Layout); 
            $this->__sections = [];
            $this->__layout = null;
            $this->__current_section = null;
        }

        private function __setDirectory(string $directory)
        {
            if (!is_dir($_SERVER['DOCUMENT_ROOT'] . "/QuanLyNhanSu_BTL_PHP" . "/" . $directory)) {
                throw new Exception();
            }
            $this->__directory = $directory;
        }

        private function __setDirectory_Layout(string $__directory_Layout)
        {
            if (!is_dir($_SERVER['DOCUMENT_ROOT'] . "/QuanLyNhanSu_BTL_PHP" . "/" . $__directory_Layout)) {
                throw new Exception();
            }
            $this->__directory_Layout = $__directory_Layout;
        }

        private function __resolvePath(string $path)
        {
            $file = $_SERVER['DOCUMENT_ROOT'] . "/QuanLyNhanSu_BTL_PHP" . "/" . $this->__directory . '/' . $path . '.php';
            if (!file_exists($file)) {
                throw new Exception();
            }
            return $file;
        }
        
        private function __resolvePathLayout(string $path)
        {
            $file = $_SERVER['DOCUMENT_ROOT'] . "/QuanLyNhanSu_BTL_PHP" . "/" . $this->__directory_Layout . '/' . $path . '.php';
            if (!file_exists($file)) {
                throw new Exception();
            }
            return $file;
        }

        /**
         * 
         * Include một view trong một view
         * 
         * @param string $view_name Tên view cần include (giống include file php trong php đó)
         * 
         * 
         */
        public function include(string $view_name)
        {
            ob_start();
        
            include_once $this->__resolvePath($view_name);
        
            $content = ob_get_contents();
        
            ob_end_clean();
        
            echo $content;
        }
        
        /**
         * 
         * Hàm bắt đầu một section
         * 
         * @param string $name Tên của section.
         * 
         */
        public function section(string $name)
        {
            $this->__current_section = $name;
            ob_start();
        }
        
        /**
         * 
         * Hàm kết thúc một section
         * 
         */
        public function end()
        {
            if (empty($this->__current_section)) {
                throw new Exception("There is not a section start");
            }
        
            $content = ob_get_contents();
        
            ob_end_clean();
        
            $this->__sections[$this->__current_section] = $content;
        
            $this->__current_section = null;
        }
        
        /**
         * 
         * Hàm kế thùa layout trong views
         * 
         * @param string $layout Layout cần kế thừa
         * 
         */
        public function layout(string $layout)
        {
            $this->__layout = $layout;
        }
        
        /**
         * 
         * Hàm xác định vị trí section sẽ được render trong file layout view
         * 
         * @param string $name Tên section cần render
         * 
         * 
         */
        public function renderSection(string $name)
        {
            echo $this->__sections[$name];
        }
        
        /**
         * 
         * Hàm load view
         * 
         * @param string $view_name Tên view cần load
         * @param array $args Các tham số cần truyền qua view
         * 
         * @return string
         * 
         */
        public function render(string $view_name, array $args)
        {
            if (is_array($args)) {
                extract($args);
            }
        
            ob_start();

            include_once $this->__resolvePath($view_name);
        
            $content = ob_get_clean();
        
            if (empty($this->__layout)) {
                return $content;
            }
        
            ob_clean();
        
            include_once $this->__resolvePathLayout($this->__layout);
        
            $output = ob_get_contents();
        
            ob_end_clean();
        
            return $output;
        }
    }
?>