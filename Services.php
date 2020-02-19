<?php

class Services {
    var $services        = array();
    var $services_types  = array();
    //----------------------------------------------------------------------------------------------------------------------------------------
    
    function __construct()
    {
        $this->readServices();
    }
    //----------------------------------------------------------------------------------------------------------------------------------------
    
    function readServicesJSON()
    {
        $json_string = file_get_contents("services_data.json");
        return json_decode($json_string, true);
    }
    //----------------------------------------------------------------------------------------------------------------------------------------
    
    function readServices()
    {
        $services = $this->readServicesJSON();
        
        foreach($services as $service_type => $services_data) {
            $this->services_types[] = $service_type;

            foreach($services_data['services'] as $key => $service) {
                if(isset($service['type'])) {
                    $services[$service_type]['services'][$key]['img'] = $this->getServiceImageByType($service['type']);
                }
            }
        }

        $this->services = $services;
    }
    //----------------------------------------------------------------------------------------------------------------------------------------
    
    function getServices()
    {
        $services = $this->readServicesJSON();

        foreach($this->services_types as $service_types) {
            foreach($services[$service_types]['services'] as $key => $service) {
                if(isset($service['type'])) {
                    $services[$service_types]['services'][$key]['img'] = $this->getServiceImageByType($service['type']);
                }
            }
        }

        return $services;
    }
    //----------------------------------------------------------------------------------------------------------------------------------------

    function getServiceImageByType($type)
    {
        return 'img/services/'.(file_exists('img/services/'.$type.'.png') ? $type.'.png' : (file_exists('img/services/'.$type.'.jpg') ? file_exists('img/services/'.$type.'.jpg') : 'no_image.png'));
    }
    //----------------------------------------------------------------------------------------------------------------------------------------

}
?>