<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
| TEMPLATE LIB(Home Grown)
| -------------------------------------------------------------------
| This templating system will be used to control the theme and available
| files within the application
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|    ['displayItems'] An array of key=>values used globally to set variables
|
*/

class template {
    var $displayItems;
    #Set variables to be used in the view
    function set($key,$value){
        if(!empty($key))
            $this->displayItems[$key] = $value;
    }

    function get($key){
        return $this->displayItems[$key];
    }

    function showVariables(){
        foreach($this->displayItems as $k=>$v){
            if(!is_array($v))
                echo "<b>\$$k</b>: $v<br>\n";
            else{
                foreach($v as $subK=>$subV){
                    echo "<b>\${$k}['$subK']</b>: $subV<br>\n";
                }
            }

        }
    }

    function view($viewFile,$return=false){
        #Create an instance
        $CI = & get_instance();
        $theme = $CI->config->item("theme");

        #set the default theme if no config was set
        if(!$theme)
            $theme = "default";

        #Setup some basic theme variables
        $this->set("siteUrl",site_url());
        $this->set("themeUrl",site_url()."system/application/views/".$theme."/");
        $this->set("themeDirUrl",site_url()."system/application/views/");
        $this->set("theme",$theme);

        #We can create as many of these as we want, but for now we will use these 4
        if($viewFile == 'login')
        {
            $this->_header = $CI->load->view($theme."/loginheader",$this->displayItems,TRUE)."\n<!-- Ending {$viewFile} header call -->\n";
            $this->_footer = $CI->load->view($theme."/loginfooter",$this->displayItems,TRUE)."\n<!-- Ending {$viewFile} footer call -->\n";
        }
        else
        {
            $this->_header = $CI->load->view($theme."/header",$this->displayItems,TRUE)."\n<!-- Ending {$viewFile} header call -->\n";
            $this->_leftbar = $CI->load->view($theme."/leftbar",$this->displayItems,TRUE)."\n<!-- Ending {$viewFile} leftbar call -->\n";
            $this->_footer = $CI->load->view($theme."/footer",$this->displayItems,TRUE)."\n<!-- Ending {$viewFile} footer call -->\n";
        }

        #This is what was originally called. The content.
        $this->_content = $CI->load->view($theme."/pages/".$viewFile,$this->displayItems,TRUE)."\n<!-- Ending {$viewFile} content call -->\n";

        #Lets set these up as variables to our index file.
        $view["header"] = (isset($this->_header) ? $this->_header : "");
        $view["leftbar"] = (isset($this->_leftbar) ? $this->_leftbar : "");
        $view["footer"] = (isset($this->_footer) ? $this->_footer : "");
        $view["content"] = (isset($this->_content) ? $this->_content : "");

        return $CI->load->view($theme."/index",$view,$return);
    }
}
?>