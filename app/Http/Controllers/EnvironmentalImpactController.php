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
            'guide' => [
                'eyebrow' => 'الأدلة والسياسات',
                'title' => 'سجل الجوانب والتأثيرات البيئية',
                'sections' => [
                    ['heading' => 'ما هو؟', 'body' => ['قائمة بأنشطة منشأتك التي تؤثر في البيئة، مثل استهلاك الطاقة، أو توليد النفايات، أو استخدام المياه، أو استخدام المواد الكيميائية. وتدوّن لكل نشاط منها الضرر الذي يلحق بالبيئة وكيفية التحكم فيه.']],
                    ['heading' => 'ما أهميته؟', 'body' => ['تشترط المواصفة ISO 14001 وجود قائمة محددة بالجوانب والتأثيرات البيئية لمنشأتك، مع ضوابط موثقة. وسيسألك المدقق: «أرني ما الذي تقوم به ويؤثر في البيئة، وكيف تحدّ منه؟»']],
                    ['heading' => 'الخطوات الأساسية', 'body' => []],
                ],
                'steps' => [
                    'حدّد أنشطة منشأتك التي تؤثر في البيئة.',
                    'دوّن لكل نشاط تأثيره وكيفية التحكم فيه.',
                    'عيّن لكل نشاط مسؤولًا وطريقة لرصده.',
                    'راجِع القائمة وحدّثها عند تغيّر العمليات.',
                    'ناقِشها في الاجتماع السنوي لمراجعة الإدارة.',
                ],
            ],
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
                'impact' => ['label' => 'التأثير البيئي', 'type' => 'text', 'wide' => true, 'placeholder' => 'مثال: تغير المناخ، التلوث، استنزاف الموارد'],
                'controls' => ['label' => 'الضوابط / الإجراءات', 'type' => 'text', 'wide' => true, 'placeholder' => 'مثال: إضاءة LED، برنامج إعادة التدوير، ترشيد المياه'],
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
