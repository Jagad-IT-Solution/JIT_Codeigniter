<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/bigquery/connection/v1/connection.proto

namespace GPBMetadata\Google\Cloud\Bigquery\Connection\V1;

class Connection
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Iam\V1\IamPolicy::initOnce();
        \GPBMetadata\Google\Iam\V1\Policy::initOnce();
        \GPBMetadata\Google\Protobuf\GPBEmpty::initOnce();
        \GPBMetadata\Google\Protobuf\FieldMask::initOnce();
        \GPBMetadata\Google\Protobuf\Wrappers::initOnce();
        $pool->internalAddGeneratedFile(hex2bin(
            "0abe200a34676f6f676c652f636c6f75642f62696771756572792f636f6e6e656374696f6e2f76312f636f6e6e656374696f6e2e70726f746f1223676f6f676c652e636c6f75642e62696771756572792e636f6e6e656374696f6e2e76311a17676f6f676c652f6170692f636c69656e742e70726f746f1a1f676f6f676c652f6170692f6669656c645f6265686176696f722e70726f746f1a19676f6f676c652f6170692f7265736f757263652e70726f746f1a1e676f6f676c652f69616d2f76312f69616d5f706f6c6963792e70726f746f1a1a676f6f676c652f69616d2f76312f706f6c6963792e70726f746f1a1b676f6f676c652f70726f746f6275662f656d7074792e70726f746f1a20676f6f676c652f70726f746f6275662f6669656c645f6d61736b2e70726f746f1a1e676f6f676c652f70726f746f6275662f77726170706572732e70726f746f22ba010a17437265617465436f6e6e656374696f6e5265717565737412390a06706172656e741801200128094229e04102fa41230a216c6f636174696f6e732e676f6f676c65617069732e636f6d2f4c6f636174696f6e121a0a0d636f6e6e656374696f6e5f69641802200128094203e0410112480a0a636f6e6e656374696f6e18032001280b322f2e676f6f676c652e636c6f75642e62696771756572792e636f6e6e656374696f6e2e76312e436f6e6e656374696f6e4203e04102225a0a14476574436f6e6e656374696f6e5265717565737412420a046e616d651801200128094234e04102fa412e0a2c6269677175657279636f6e6e656374696f6e2e676f6f676c65617069732e636f6d2f436f6e6e656374696f6e227f0a164c697374436f6e6e656374696f6e735265717565737412390a06706172656e741801200128094229e04102fa41230a216c6f636174696f6e732e676f6f676c65617069732e636f6d2f4c6f636174696f6e12160a09706167655f73697a651804200128054203e0410212120a0a706167655f746f6b656e18032001280922780a174c697374436f6e6e656374696f6e73526573706f6e736512170a0f6e6578745f706167655f746f6b656e18012001280912440a0b636f6e6e656374696f6e7318022003280b322f2e676f6f676c652e636c6f75642e62696771756572792e636f6e6e656374696f6e2e76312e436f6e6e656374696f6e22dd010a17557064617465436f6e6e656374696f6e5265717565737412420a046e616d651801200128094234e04102fa412e0a2c6269677175657279636f6e6e656374696f6e2e676f6f676c65617069732e636f6d2f436f6e6e656374696f6e12480a0a636f6e6e656374696f6e18022001280b322f2e676f6f676c652e636c6f75642e62696771756572792e636f6e6e656374696f6e2e76312e436f6e6e656374696f6e4203e0410212340a0b7570646174655f6d61736b18032001280b321a2e676f6f676c652e70726f746f6275662e4669656c644d61736b4203e04102225d0a1744656c657465436f6e6e656374696f6e5265717565737412420a046e616d651801200128094234e04102fa412e0a2c6269677175657279636f6e6e656374696f6e2e676f6f676c65617069732e636f6d2f436f6e6e656374696f6e22b4030a0a436f6e6e656374696f6e120c0a046e616d6518012001280912150a0d667269656e646c795f6e616d6518022001280912130a0b6465736372697074696f6e180320012809124c0a09636c6f75645f73716c18042001280b32372e676f6f676c652e636c6f75642e62696771756572792e636f6e6e656374696f6e2e76312e436c6f756453716c50726f70657274696573480012410a0361777318082001280b32322e676f6f676c652e636c6f75642e62696771756572792e636f6e6e656374696f6e2e76312e41777350726f706572746965734800121a0a0d6372656174696f6e5f74696d651805200128034203e04103121f0a126c6173745f6d6f6469666965645f74696d651806200128034203e04103121b0a0e6861735f63726564656e7469616c1807200128084203e041033a73ea41700a2c6269677175657279636f6e6e656374696f6e2e676f6f676c65617069732e636f6d2f436f6e6e656374696f6e124070726f6a656374732f7b70726f6a6563747d2f6c6f636174696f6e732f7b6c6f636174696f6e7d2f636f6e6e656374696f6e732f7b636f6e6e656374696f6e7d420c0a0a70726f7065727469657322a9020a12436c6f756453716c50726f7065727469657312130a0b696e7374616e63655f696418012001280912100a08646174616261736518022001280912520a047479706518032001280e32442e676f6f676c652e636c6f75642e62696771756572792e636f6e6e656374696f6e2e76312e436c6f756453716c50726f706572746965732e44617461626173655479706512500a0a63726564656e7469616c18042001280b32372e676f6f676c652e636c6f75642e62696771756572792e636f6e6e656374696f6e2e76312e436c6f756453716c43726564656e7469616c4203e0410422460a0c446174616261736554797065121d0a1944415441424153455f545950455f554e5350454349464945441000120c0a08504f535447524553100112090a054d5953514c100222380a12436c6f756453716c43726564656e7469616c12100a08757365726e616d6518012001280912100a0870617373776f72641802200128092280010a0d41777350726f7065727469657312560a1263726f73735f6163636f756e745f726f6c6518022001280b32382e676f6f676c652e636c6f75642e62696771756572792e636f6e6e656374696f6e2e76312e41777343726f73734163636f756e74526f6c65480042170a1561757468656e7469636174696f6e5f6d6574686f64225e0a1341777343726f73734163636f756e74526f6c6512130a0b69616d5f726f6c655f696418012001280912180a0b69616d5f757365725f69641802200128094203e0410312180a0b65787465726e616c5f69641803200128094203e0410332cc0d0a11436f6e6e656374696f6e5365727669636512e8010a10437265617465436f6e6e656374696f6e123c2e676f6f676c652e636c6f75642e62696771756572792e636f6e6e656374696f6e2e76312e437265617465436f6e6e656374696f6e526571756573741a2f2e676f6f676c652e636c6f75642e62696771756572792e636f6e6e656374696f6e2e76312e436f6e6e656374696f6e226582d3e493023d222f2f76312f7b706172656e743d70726f6a656374732f2a2f6c6f636174696f6e732f2a7d2f636f6e6e656374696f6e733a0a636f6e6e656374696f6eda411f706172656e742c636f6e6e656374696f6e2c636f6e6e656374696f6e5f696412bb010a0d476574436f6e6e656374696f6e12392e676f6f676c652e636c6f75642e62696771756572792e636f6e6e656374696f6e2e76312e476574436f6e6e656374696f6e526571756573741a2f2e676f6f676c652e636c6f75642e62696771756572792e636f6e6e656374696f6e2e76312e436f6e6e656374696f6e223e82d3e4930231122f2f76312f7b6e616d653d70726f6a656374732f2a2f6c6f636174696f6e732f2a2f636f6e6e656374696f6e732f2a7dda41046e616d6512ce010a0f4c697374436f6e6e656374696f6e73123b2e676f6f676c652e636c6f75642e62696771756572792e636f6e6e656374696f6e2e76312e4c697374436f6e6e656374696f6e73526571756573741a3c2e676f6f676c652e636c6f75642e62696771756572792e636f6e6e656374696f6e2e76312e4c697374436f6e6e656374696f6e73526573706f6e7365224082d3e4930231122f2f76312f7b706172656e743d70726f6a656374732f2a2f6c6f636174696f6e732f2a7d2f636f6e6e656374696f6e73da4106706172656e7412e4010a10557064617465436f6e6e656374696f6e123c2e676f6f676c652e636c6f75642e62696771756572792e636f6e6e656374696f6e2e76312e557064617465436f6e6e656374696f6e526571756573741a2f2e676f6f676c652e636c6f75642e62696771756572792e636f6e6e656374696f6e2e76312e436f6e6e656374696f6e226182d3e493023d322f2f76312f7b6e616d653d70726f6a656374732f2a2f6c6f636174696f6e732f2a2f636f6e6e656374696f6e732f2a7d3a0a636f6e6e656374696f6eda411b6e616d652c636f6e6e656374696f6e2c7570646174655f6d61736b12a8010a1044656c657465436f6e6e656374696f6e123c2e676f6f676c652e636c6f75642e62696771756572792e636f6e6e656374696f6e2e76312e44656c657465436f6e6e656374696f6e526571756573741a162e676f6f676c652e70726f746f6275662e456d707479223e82d3e49302312a2f2f76312f7b6e616d653d70726f6a656374732f2a2f6c6f636174696f6e732f2a2f636f6e6e656374696f6e732f2a7dda41046e616d6512a9010a0c47657449616d506f6c69637912222e676f6f676c652e69616d2e76312e47657449616d506f6c696379526571756573741a152e676f6f676c652e69616d2e76312e506f6c696379225e82d3e493024522402f76312f7b7265736f757263653d70726f6a656374732f2a2f6c6f636174696f6e732f2a2f636f6e6e656374696f6e732f2a7d3a67657449616d506f6c6963793a012ada41107265736f757263652c6f7074696f6e7312a8010a0c53657449616d506f6c69637912222e676f6f676c652e69616d2e76312e53657449616d506f6c696379526571756573741a152e676f6f676c652e69616d2e76312e506f6c696379225d82d3e493024522402f76312f7b7265736f757263653d70726f6a656374732f2a2f6c6f636174696f6e732f2a2f636f6e6e656374696f6e732f2a7d3a73657449616d506f6c6963793a012ada410f7265736f757263652c706f6c69637912d3010a125465737449616d5065726d697373696f6e7312282e676f6f676c652e69616d2e76312e5465737449616d5065726d697373696f6e73526571756573741a292e676f6f676c652e69616d2e76312e5465737449616d5065726d697373696f6e73526573706f6e7365226882d3e493024b22462f76312f7b7265736f757263653d70726f6a656374732f2a2f6c6f636174696f6e732f2a2f636f6e6e656374696f6e732f2a7d3a7465737449616d5065726d697373696f6e733a012ada41147265736f757263652c7065726d697373696f6e731a7eca41216269677175657279636f6e6e656374696f6e2e676f6f676c65617069732e636f6dd2415768747470733a2f2f7777772e676f6f676c65617069732e636f6d2f617574682f62696771756572792c68747470733a2f2f7777772e676f6f676c65617069732e636f6d2f617574682f636c6f75642d706c6174666f726d42c6010a27636f6d2e676f6f676c652e636c6f75642e62696771756572792e636f6e6e656374696f6e2e763150015a4d676f6f676c652e676f6c616e672e6f72672f67656e70726f746f2f676f6f676c65617069732f636c6f75642f62696771756572792f636f6e6e656374696f6e2f76313b636f6e6e656374696f6eaa0223476f6f676c652e436c6f75642e42696751756572792e436f6e6e656374696f6e2e5631ca0223476f6f676c655c436c6f75645c42696751756572795c436f6e6e656374696f6e5c5631620670726f746f33"
        ), true);

        static::$is_initialized = true;
    }
}
