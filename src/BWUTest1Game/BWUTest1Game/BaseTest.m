//
//  BaseTest.m
//  BWUTest1Game
//
//  Created by Kostya Kolesnyk on 8/6/13.
//  Copyright (c) 2013 Kostya Kolesnyk. All rights reserved.
//

#import "BaseTest.h"

#define WIN_FIRST @"First"
#define WIN_SECOND @"Second"

@implementation BaseTest

-(id)init
{
    self = [super init];
    if (self) {
        [self commonInit];
    }
    return self;
}

-(void)commonInit
{
    self.testData = @[ @[@"a", WIN_FIRST],
                       @[@"ab", WIN_SECOND],
                       @[@"zz", WIN_FIRST],
                       @[@"aba", WIN_FIRST],
                       @[@"abca", WIN_SECOND],
                       @[@"aabb", WIN_FIRST],
                       @[@"abacaba", WIN_FIRST],
                       @[@"abazaba", WIN_FIRST],
                       @[@"aassddxyz", WIN_FIRST],
                       @[@"aabc", WIN_SECOND],
                       @[@"abcabc", WIN_FIRST],
                       @[@"aaabbbccdd", WIN_SECOND],
                       @[@"aabbcccc", WIN_FIRST],
                       @[@"gevqgtaorjixsxnbcoybr", WIN_FIRST],
                       @[@"xvhtcbtouuddhylxhplgjxwlo", WIN_FIRST],
                       @[@"ctjxzuimsxnarlciuynqeoqmmbqtagszuo", WIN_SECOND],
                       @[@"abcdefghijklmnopqrstuvwxyz", WIN_SECOND],
                       @[@"desktciwoidfuswycratvovutcgjrcyzmilsmadzaegseetexygedzxdmorxzxgiqhcuppshcsjcozkopebegfmxzxxagzwoymlghgjexcgfojychyt", WIN_FIRST],
                       @[@"vnvtvnxjrtffdhrfvczzoyeokjabxcilmmsrhwuakghvuabcmfpmblyroodmhfivmhqoiqhapoglwaluewhqkunzitmvijaictjdncivccedfpaezcnpwemlohbhjjlqsonuclaumgbzjamsrhuzqdqtitygggsnruuccdtxkgbdd", WIN_FIRST],
                       @[@"hxueikegwnrctlciwguepdsgupguykrntbszeqzzbpdlouwnmqgzcxejidstxyxhdlnttnibxstduwiflouzfswfikdudkazoefawm", WIN_SECOND],
                       @[@"aaaaaaaaaaaaaaaaaaaabbbbbbbbbbbbbbbbbbbbccccccccccccccccccccddddddddddeeeeeeeeeeffffgggghhhhiiiijjjjqqqqwwwweeeerrrrttttyyyyuuuuiiiiooooppppaaaassssddddffffgggghhhhjjjjkkkkllllzzzzxxxxccccvvvvbbbbnnnnmmmm", WIN_FIRST]
                    ];
}

@end
