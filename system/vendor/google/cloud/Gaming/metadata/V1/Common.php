<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/gaming/v1/common.proto

namespace GPBMetadata\Google\Cloud\Gaming\V1;

class Common
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Protobuf\Duration::initOnce();
        \GPBMetadata\Google\Protobuf\Timestamp::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        $pool->internalAddGeneratedFile(hex2bin(
            "0afb140a23676f6f676c652f636c6f75642f67616d696e672f76312f636f6d6d6f6e2e70726f746f1216676f6f676c652e636c6f75642e67616d696e672e76311a1e676f6f676c652f70726f746f6275662f6475726174696f6e2e70726f746f1a1f676f6f676c652f70726f746f6275662f74696d657374616d702e70726f746f1a1c676f6f676c652f6170692f616e6e6f746174696f6e732e70726f746f22da030a114f7065726174696f6e4d6574616461746112340a0b6372656174655f74696d6518012001280b321a2e676f6f676c652e70726f746f6275662e54696d657374616d704203e0410312310a08656e645f74696d6518022001280b321a2e676f6f676c652e70726f746f6275662e54696d657374616d704203e0410312130a067461726765741803200128094203e0410312110a04766572621804200128094203e04103121b0a0e7374617475735f6d6573736167651805200128094203e0410312230a167265717565737465645f63616e63656c6c6174696f6e1806200128084203e0410312180a0b6170695f76657273696f6e1807200128094203e0410312180a0b756e726561636861626c651808200328094203e04103125d0a106f7065726174696f6e5f73746174757318092003280b323e2e676f6f676c652e636c6f75642e67616d696e672e76312e4f7065726174696f6e4d657461646174612e4f7065726174696f6e537461747573456e7472794203e041031a5f0a144f7065726174696f6e537461747573456e747279120b0a036b657918012001280912360a0576616c756518022001280b32272e676f6f676c652e636c6f75642e67616d696e672e76312e4f7065726174696f6e5374617475733a02380122ee010a0f4f7065726174696f6e53746174757312110a04646f6e651801200128084203e0410312450a0a6572726f725f636f646518022001280e32312e676f6f676c652e636c6f75642e67616d696e672e76312e4f7065726174696f6e5374617475732e4572726f72436f646512150a0d6572726f725f6d657373616765180320012809226a0a094572726f72436f6465121a0a164552524f525f434f44455f554e535045434946494544100012120a0e494e5445524e414c5f4552524f52100112150a115045524d495353494f4e5f44454e494544100212160a12434c55535445525f434f4e4e454354494f4e10032281010a0d4c6162656c53656c6563746f7212410a066c6162656c7318012003280b32312e676f6f676c652e636c6f75642e67616d696e672e76312e4c6162656c53656c6563746f722e4c6162656c73456e7472791a2d0a0b4c6162656c73456e747279120b0a036b6579180120012809120d0a0576616c75651802200128093a023801221f0a0d5265616c6d53656c6563746f72120e0a067265616c6d7318012003280922b1010a085363686564756c65122e0a0a73746172745f74696d6518012001280b321a2e676f6f676c652e70726f746f6275662e54696d657374616d70122c0a08656e645f74696d6518022001280b321a2e676f6f676c652e70726f746f6275662e54696d657374616d7012340a1163726f6e5f6a6f625f6475726174696f6e18032001280b32192e676f6f676c652e70726f746f6275662e4475726174696f6e12110a0963726f6e5f73706563180420012809223b0a0a53706563536f75726365121f0a1767616d655f7365727665725f636f6e6669675f6e616d65180120012809120c0a046e616d6518022001280922ad040a0d54617267657444657461696c7312200a1867616d655f7365727665725f636c75737465725f6e616d6518012001280912230a1b67616d655f7365727665725f6465706c6f796d656e745f6e616d65180220012809124f0a0d666c6565745f64657461696c7318032003280b32382e676f6f676c652e636c6f75642e67616d696e672e76312e54617267657444657461696c732e546172676574466c65657444657461696c731a83030a12546172676574466c65657444657461696c7312530a05666c65657418012001280b32442e676f6f676c652e636c6f75642e67616d696e672e76312e54617267657444657461696c732e546172676574466c65657444657461696c732e546172676574466c65657412620a0a6175746f7363616c657218022001280b324e2e676f6f676c652e636c6f75642e67616d696e672e76312e54617267657444657461696c732e546172676574466c65657444657461696c732e546172676574466c6565744175746f7363616c65721a540a0b546172676574466c656574120c0a046e616d6518012001280912370a0b737065635f736f7572636518022001280b32222e676f6f676c652e636c6f75642e67616d696e672e76312e53706563536f757263651a5e0a15546172676574466c6565744175746f7363616c6572120c0a046e616d6518012001280912370a0b737065635f736f7572636518022001280b32222e676f6f676c652e636c6f75642e67616d696e672e76312e53706563536f7572636522450a0b546172676574537461746512360a0764657461696c7318012003280b32252e676f6f676c652e636c6f75642e67616d696e672e76312e54617267657444657461696c73229b050a144465706c6f796564466c65657444657461696c7312520a0e6465706c6f7965645f666c65657418012001280b323a2e676f6f676c652e636c6f75642e67616d696e672e76312e4465706c6f796564466c65657444657461696c732e4465706c6f796564466c65657412610a136465706c6f7965645f6175746f7363616c657218022001280b32442e676f6f676c652e636c6f75642e67616d696e672e76312e4465706c6f796564466c65657444657461696c732e4465706c6f796564466c6565744175746f7363616c65721ac3020a0d4465706c6f796564466c656574120d0a05666c65657418012001280912120a0a666c6565745f7370656318022001280912370a0b737065635f736f7572636518032001280b32222e676f6f676c652e636c6f75642e67616d696e672e76312e53706563536f75726365125e0a0673746174757318052001280b324e2e676f6f676c652e636c6f75642e67616d696e672e76312e4465706c6f796564466c65657444657461696c732e4465706c6f796564466c6565742e4465706c6f796564466c6565745374617475731a760a134465706c6f796564466c65657453746174757312160a0e72656164795f7265706c69636173180120012803121a0a12616c6c6f63617465645f7265706c6963617318022001280312190a1172657365727665645f7265706c6963617318032001280312100a087265706c696361731804200128031a85010a174465706c6f796564466c6565744175746f7363616c657212120a0a6175746f7363616c657218012001280912370a0b737065635f736f7572636518042001280b32222e676f6f676c652e636c6f75642e67616d696e672e76312e53706563536f75726365121d0a15666c6565745f6175746f7363616c65725f73706563180320012809425c0a1a636f6d2e676f6f676c652e636c6f75642e67616d696e672e763150015a3c676f6f676c652e676f6c616e672e6f72672f67656e70726f746f2f676f6f676c65617069732f636c6f75642f67616d696e672f76313b67616d696e67620670726f746f33"
        ), true);

        static::$is_initialized = true;
    }
}
