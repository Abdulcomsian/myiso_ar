<?php

namespace App\Http\Controllers;

use App\EnvironmentalImpact;

class EnvironmentalImpactController extends SimpleRegisterController
{
    protected function model()
    {
        return EnvironmentalImpact::class;
    }

    protected function module()
    {
        return [
            'key' => 'environmental_impacts',
            'admin_url' => 'environmentalImpactsad',
            'title' => 'التأثيرات البيئية',
            'subtitle' => 'قائمة بتأثيرات أنشطة شركتك على البيئة وكيفية التحكم فيها.',
            'info_title' => 'أضف العناصر التي تؤثر على البيئة مثل:',
            'info_items' => ['استهلاك الطاقة', 'توليد النفايات', 'استخدام المياه', 'استخدام المواد الكيميائية'],
            'add_label' => 'إضافة جانب بيئي',
            'edit_title' => 'تعديل الجانب البيئي',
            'item_name' => 'جانب بيئي',
            'search_placeholder' => 'ابحث في الجوانب البيئية…',
            'empty' => 'لم تتم إضافة أي جوانب بيئية بعد.',
            'icon' => 'fa-leaf',
            'label_field' => 'aspect',
            'fields' => [
                'aspect' => ['label' => 'الجانب البيئي', 'type' => 'text', 'required' => true, 'wide' => true, 'placeholder' => 'مثال: استهلاك الطاقة، النفايات الناتجة، استهلاك المياه'],
                'impact' => ['label' => 'التأثير البيئي', 'type' => 'text', 'required' => true, 'wide' => true, 'placeholder' => 'مثال: تغير المناخ، التلوث، استنزاف الموارد'],
                'controls' => ['label' => 'الضوابط / الإجراءات', 'type' => 'text', 'required' => true, 'wide' => true, 'placeholder' => 'مثال: إضاءة LED، برنامج إعادة التدوير، ترشيد المياه'],
                'responsible_person' => ['label' => 'الشخص المسؤول', 'type' => 'text', 'placeholder' => 'مثال: أحمد محمد (اختياري)'],
                'monitoring_method' => ['label' => 'طريقة المراقبة', 'type' => 'text', 'placeholder' => 'مثال: فحص شهري، عدّ أسبوعي (اختياري)'],
            ],
            'columns' => [
                'aspect' => 'الجانب البيئي',
                'impact' => 'التأثير',
                'controls' => 'الضوابط',
                'responsible_person' => 'المسؤول',
                'monitoring_method' => 'المراقبة',
            ],
        ];
    }
}
