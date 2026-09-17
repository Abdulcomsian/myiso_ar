<?php

namespace App\Http\Controllers;

use App\Hazard;

class HazardController extends SimpleRegisterController
{
    protected function model()
    {
        return Hazard::class;
    }

    protected function module()
    {
        return [
            'key' => 'hazards',
            'admin_url' => 'hazardsad',
            'title' => 'المخاطر (الصحة والسلامة)',
            'subtitle' => 'قائمة بالمخاطر في مكان العمل وكيفية الحفاظ على سلامة الأشخاص.',
            'info_title' => 'أضف المخاطر التي قد تؤذي الأشخاص مثل:',
            'info_items' => ['الانزلاق والتعثر والسقوط', 'الأدوات الحادة أو الآلات', 'المواد الكيميائية أو المواد الخطرة', 'رفع الأحمال الثقيلة أو العمل المتكرر'],
            'add_label' => 'إضافة خطر',
            'edit_title' => 'تعديل الخطر',
            'item_name' => 'خطر',
            'search_placeholder' => 'ابحث في المخاطر…',
            'empty' => 'لم تتم إضافة أي مخاطر بعد.',
            'icon' => 'fa-hard-hat',
            'label_field' => 'hazard',
            'fields' => [
                'hazard' => ['label' => 'الخطر', 'type' => 'text', 'required' => true, 'wide' => true, 'placeholder' => 'مثال: الانزلاق على أرضية مبللة، أدوات حادة، حروق كيميائية'],
                'risk' => ['label' => 'المخاطرة / التأثير', 'type' => 'text', 'required' => true, 'wide' => true, 'placeholder' => 'مثال: قد يتعرض موظف لكسر في الساق، قد يُصاب زائر، حروق شديدة'],
                'controls' => ['label' => 'الضوابط', 'type' => 'text', 'required' => true, 'wide' => true, 'placeholder' => 'مثال: الحفاظ على جفاف الأرضية، استخدام واقيات الأدوات، تخزين المواد الكيميائية بأمان'],
                'responsible_person' => ['label' => 'الشخص المسؤول', 'type' => 'text', 'placeholder' => 'مثال: أحمد محمد (اختياري)'],
                'monitoring_method' => ['label' => 'طريقة المراقبة', 'type' => 'text', 'placeholder' => 'مثال: فحص يومي، تفتيش أسبوعي (اختياري)'],
            ],
            'columns' => [
                'hazard' => 'الخطر',
                'risk' => 'المخاطرة',
                'controls' => 'الضوابط',
                'responsible_person' => 'المسؤول',
                'monitoring_method' => 'المراقبة',
            ],
        ];
    }
}
