<?php

namespace App\Http\Controllers\PHP8\P342DependencyInjection;

class ProgramP342DependencyInjection
{
    public function index() {
        $assembler = new ObjectAssembler(base_path("App/Http/Controllers/PHP8/P342DependencyInjection/objects.xml"));
        $encoder = $assembler->getComponent(ApptEncoder::class);
        $apptmaker = new AppointmentMaker($encoder);
        $out = $apptmaker->makeAppointment();
        print $out;

        $apptmaker = $assembler->getComponent(AppointmentMaker::class);
        $out = $apptmaker->makeAppointment();
        print $out;
    }
}
