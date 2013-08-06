//
//  Game.h
//  BWUTest1Game
//
//  Created by Kostya Kolesnyk on 8/6/13.
//  Copyright (c) 2013 Kostya Kolesnyk. All rights reserved.
//

#import <Foundation/Foundation.h>

@interface Game : NSObject

- (id)initWithString: (NSString *)string;
-(NSString *)processGame;

@property NSString * string;

@end
