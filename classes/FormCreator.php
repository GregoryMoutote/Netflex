<?php

class FormCreator
{

    public function __construct($method = "post", $action = "", $is_multiPart = false)
    {
        echo "<form method=" . $method . " action=" . $action . " ";
        if($is_multiPart)
            echo "enctype='multipart/form-data'";
        echo ">";
    }

    public function field_set_start($legend)
    {
        echo
        "<fieldset>
        <legend>";
        if(isset($legend))
            echo $legend;
        echo "</legend>";
    }

    public function field_set_end()
    {
        echo "</fieldset>";
    }

    public function form_end()
    {
        echo "</form>";
    }

    public function input($name = "input", $options = [])
    {
        echo '<div>';
        $default_options = [
            "type" => "text",
            "id" => $name,
            "label" => ucfirst($name),
            "placeholder" => "",
            "value" => "",
            "pattern" => "",
            "min" => "",
            "max" => "",
        ];
        $options = array_merge($default_options, $options);
        echo "<input type=" . $options['type'];
        if ($options["type"] == "checkbox" || $options["type"] == "radio") {
            $default_checkbox_options = [
                "is_checked" => false
            ];
            $options = array_merge($default_checkbox_options, $options);
            echo $options["is_checked"] ? " checked" : "";
        } else if ($options["type"] == "file") {
            $default_file_options = [
                "is_multiple" => false,
                "accept" => "image/png, image/jpeg"
            ];
            $options = array_merge($default_file_options, $options);
            echo $options["is_multiple"] ? " multiple":"";
        } else {
            if($options["type"] != "color")
                echo " class='textuel'";
        }
        echo " name=" . $name . " id=" . $options["id"];
        if($options["type"] == "email" || $options["type"] == "number" ||
            $options["type"] == "tel" || $options["type"] == "search" ||
            $options["type"] == "password" || $options["type"] == "text" || $options["type"] == "url") {
            if ($options["placeholder"] == "") {
                echo " placeholder=''";
            } else {
                echo " placeholder=" . $options["value"];
            }
        }
        if($options["value"] != "") {
            echo " value=" . $options["value"];
        }
        if($options["pattern"] != "") {
            echo " pattern=" . $options["pattern"];
        }
        echo "><label for=" . $options["id"] . ">" . $options["label"] . "</label>";
        echo '</div>';
    }

    public function text_area($name = "area", $options = []) {
        echo '<div>';
        $default_options = [
            "id" => $name,
            "label" => ucfirst($name),
            "placeholder" => "",
            "value" => ""
        ];
        $options = array_merge($default_options, $options);
        echo "<label for=" . $options["id"] . " class='arealabel'>" . $options["label"] . "</label>";
        echo '<textarea id=' . $options["id"] . ' name=' . $name . ' required cols="45" rows="10" ';
        if(isset($options["max_length"])) {
            echo 'maxlength=' . $options["max_length"];
        }
        echo '></textarea>';
        echo '</div>';
    }

    public function submit_button($text = "Envoyer") {
        echo '<button type="submit" class="submit">' . $text . '</button>';
    }

    public function reset_button() {
        echo '<button type="reset">Effacer</button>';
    }
}